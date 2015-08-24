<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hekunyu
 * Date: 15/8/9
 * Time: 下午8:52
 */
class Task extends CI_Controller
{

	function __construct()
	{
		header("Content-Type:text/html;charset=utf-8");
		parent::__construct();
		$this->load->model('User_data'); //加载User_data模块
		$this->load->helper('url');
	}

	public function index()
	{
		redirect(base_url('task/zc'));
	}
	public function zc($step = 'index')
	{
		switch ($step) {
			case 'index':
				if ($this->User_data->is_login() == False) {
					redirect(base_url('login'));
				}
				$id = $this->session->userdata('student_id');


				$data['userinfo'] = $this->User_data->userinfo($id);

				$this->load->view('task_zc', $data);
				break;
			case '1':
				if ($this->User_data->is_login() == False) {
					redirect(base_url('login'));
				}
				$id = $this->session->userdata('student_id');
				$username = $this->session->userdata('username');
				$major = $this->session->userdata('major');
				$classnum = $this->session->userdata('classnum');
				//初始化$data['zcmasterinfo']$x = (object) array('a'=>'A', 'b'=>'B', 'C');
				if($this->db->select('*')->from('zc')->where('student_id', $id)->get()->num_rows()){
					//获取数据
					$data['zcmasterinfo'] = $this->db->select('*')->from('zc')->where('student_id', $id)->get()->row();
				}else{
					$studata= array(
						'student_id'=>$id,
						'username'=>$username,
						'major'=>$major,
						'classnum'=>$classnum,
					);
					if($this->db->insert('zc', $studata)) {
						$data['zcmasterinfo'] = $this->db->select('*')->from('zc')->where('student_id', $id)->get()->row();
					}
				};
				$data['zcgx'] = $this->db->select('*')->from('zc_gx')->where('student_id', $id)->get()->result();
				$data['userinfo'] = $this->User_data->userinfo($id);
//echo "<pre>";
//print_r($data['zcmasterinfo']);
				$this->load->view('task_zc_post', $data);
				break;
			default:
				break;
		}
	}

	public function master()
	{

		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134

		$data['userinfo'] = $this->User_data->userinfo($id);
		$data['zcmasterinfo'] = $this->db->select('student_id, gk ,ztyxf')->from('zc')->where('major', $major)->where('classnum', $classnum)->get()->result();
		$data['zcmasterclass'] = $this->db->select('xtyxfb, xylxfb, yylxfb, xxjtzb')->from('zc')->where('student_id', $id)->get()->row();
		$this->load->view('task_zc_master', $data);

	}

	public function post()
	{
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');
		$username =  $this->session->userdata('username');

		$data['userinfo'] = $this->User_data->userinfo($id);
		$data['deyu'] = $this->input->post('deyu');
		$data['xy'] = $this->input->post('xy');
		$data['nl'] = $this->input->post('nl');
		$data['gx'] = $this->input->post('gx');

		$dysum = 0;//德育总分初始化
		foreach ($data['deyu'] as $key => $val) {
			//计算公式 德育总分=（总体印象分*70%+30分）*0.15
			if ($key == 'ztyxf') {
				$dysum += $val * 0.7 * 0.15;
			} else {
				if ($key != 'beizhu') {
					$dysum += $val * 0.15;
				}
			}
		}
		if ($dysum >= 15) {
			$dysum = 15;
		}//防止德育分溢出
		$data['dysum'] = $dysum;//德育总分输出

		if($data['nl']['xsbg']>=0.6){$data['nl']['xsbg']=0.6;}//学术报告最多3场

		$gxsum = 0;//个性总分初始化
		foreach ($data['gx'] as $key => $val) {
			if (is_array($val)) {
				switch($val['lb']){
					case "a":
						$val['lb']=1;
						break;
					case "b":
						$val['lb']=0.7;
						break;
					case "c":
						$val['lb']=0.5;
						break;
					case "cy":
						$val['lb']=1;
						break;
					case "ty":
						$val['lb']=1;
						break;
				}
				$gxsum += $val['sorce'] * $val['lb'];
			}
		}
		$gxsum += $data['gx']['gxyb'];//个性栏 院杯
		$gxsum += $data['gx']['gxydh'];//个性栏 运动会
		if ($gxsum >= 40) {
			$gxsum = 40;
		}//防止德育分溢出
		$data['gxsum'] = $gxsum;//德育总分输出



		//数据库操作开始
		$zcPostDb = $data['deyu'];
		$zcPostDb['student_id']=$id;
		foreach($data['xy'] as $key=>$val){
			//学业插入
			$zcPostDb["$key"] = $val;
		}
		foreach($data['nl'] as $key=>$val){
			//能力插入
			$zcPostDb["$key"] = $val;
		}
		$zcPostDb['gxyb']=$data['gx']['gxyb'];
		$zcPostDb['gxydh']=$data['gx']['gxydh'];
		unset($zcPostDb['xfbtzb']);
		$this->db->where('student_id', $id);

		$query=$this->db->select('student_id')->from('zc')->where('student_id', $id);
		$zcex = $query->get()->num_rows();
		if($zcex){//如果该学生存在记录
			$this->db->where('student_id', $id);
			$this->db->update('zc', $zcPostDb);
		}else{
			$this->db->insert('zc', $zcPostDb);
		}

		//插入个性栏数据
		foreach($data['gx'] as $val){
			if (!empty($val['xmname'])) {
				if (is_array($val)) {
					$val['student_id'] = $id;
					$val['username'] = $username;
					$this->db->insert('zc_gx', $val);
//					echo 'ok';
				}
			}
		}
//		echo "<pre>";
//		print_r($data['gx']);

		$this->load->view('task_zc_status', $data);
	}

	public function gxdel($gxid =null)
	{
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');
		$this->db->where('id', $gxid);
		if($this->db->delete('zc_gx')){
			redirect(base_url('task'));
		}
	}


	public function postmaster()
	{
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
//        echo 'postmaster';
		$zcmaster = $this->input->post('zcmaster');
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134

		echo "<pre>";
//        print_r($zcmaster);
		foreach($zcmaster as $key=>$val){
			$query=$this->db->select('student_id')->from('zc')->where('student_id', $zcmaster["$key"]['student_id']);
			$num = $query->get()->num_rows();
			if($num){//如果该学生存在记录
				$this->db->where('student_id', $zcmaster["$key"]['student_id']);
				$this->db->update('zc', $val);
			}else{
				$this->db->insert('zc', $val);
			}
		}
		echo "更新".count($zcmaster)."位同学数据";
//		$this->db->trans_start();
//		if ($ifex) {
//			$this->db->update_batch('zc', $zcmaster, 'student_id');
//			echo "数据更新成功";
//		} else {
//			$this->db->insert_batch('zc', $zcmaster);
//
//			echo "数据插入成功";
//		}
//		$this->db->trans_complete();


		$ry = $this->input->post('ry');
//		print_r($ry);
		if ($ry) {
			$this->db->where('major', $major)->where('classnum', $classnum)->update('zc', $ry);//更新班级荣誉

		}

		$current_url = $this->input->post('current_url');
		echo "<br /><a href='" . $current_url . "'>返回</a>";
	}

}
//        $deyu = $this->input->post('deyu');
//        echo "<pre>";
//        print_r($deyu);
//        echo "<table border='1'>";
//
//        foreach($deyu as $key=>$val){
//            switch($key){
//                case "ztyxf"    :   $key='总体印象分';break;
//                case "xfbtzb"   :   $key='优良学风班、先进团支部';break;
//                case "yxqs"     :   $key='优秀寝室';break;
//                case "qtxjxjjt" :   $key='其他校级先进集体';break;
//                case "tbby"     :   $key='通报表扬';break;
//                case "zgdb"     :   $key='撰稿登播';break;
//                case "wxtchlwjy":   $key='为校（院）提出合理化建议';break;
//                case "ejxyqdjf" :   $key='二级学院确定的加分';break;
//                case "xssc90"   :   $key='学生手册考查90分以上';break;
//                case "zyzdx"    :   $key='青协星级志愿者，党校优秀学员';break;
//                case "yjtbby"   :   $key='院级通报表扬';break;
//                case "yjyxtzb"  :   $key='院级优秀团支部';break;
//                case "xx"       :   $key='献血';break;
//                case "pwjns"    :   $key='排舞吉尼斯';break;
//                case "wsyx"     :   $key='参加五四毅行';break;
//                case "ktxwgf"   :   $key='课堂行为规范';break;
//                case "ssjf"     :   $key='宿舍减分';break;
//                case "bwmxwsj"  :   $key='不文明行为纪实';break;
//                case "wjcf"     :   $key='违纪处分';break;
//                case "rjxyqdjf" :   $key='二级学院确定的减分';break;
//                case "xsgbkhbhg":   $key='学生干部考核不合格';break;
//                case "sxxcxy70" :   $key='《学生手册》内容考查70分以下或不参加考查';break;
//                case "bcjsqsqshhd": $key='不参加暑期社会实践活动';break;
//                case "wgbasjf"  :   $key='无故不按时缴付学杂费或办理相关手续';break;
//                case "beizhu"   :   $key='德育项目备注';
//                                    $val= str_replace("\n","<br />",$val);
//                                    break;
//                default:break;
//            }
//            if(!$val){$val="未填";}
//            echo "<tr><td>".$key."</td><td>".$val."</td></tr>";
//        }
//
//        $xy = $this->input->post('xy');
//        foreach($xy as $key=>$val){
//            if(!$val){$val="未填";}
//            switch($key){
//                case "all"      :   $key="学业总成绩";break;
//                case "sports"   :   $key="体测分数";break;
//                case "hadcredit":   $key="已获得学分";break;
//                case "average"  :   $key="学业加权平均分";break;
//                default:break;
//            }
//            echo "<tr><td>".$key."</td><td>".$val."</td></tr>";
//        }
//
//        $nl = $this->input->post('nl');
//        print_r($nl);
//        foreach($nl as $key=>$val){
//            if(!$val){$val="未填";}
//            switch($key){
//                case "zypm"     :   $key="课程学习成绩在专业排名情况";break;
//                case "fxk"      :   $key="辅修课";break;
//                case "zysy"     :   $key="参加并递交职业生涯规划大赛文本";break;
//                case "xsbg"     :   $key="听学术讲座报告";break;
//                case "zs"       :   $key="考证情况";break;
//                case "english"  :   $key="英语四六级";break;
//                case "enky"     :   $key="英语中级口译";break;
//                case "computer" :   $key="计算机二、三级";break;
//                case "z1"       :   $key="院学生会主席团成员及班长、团支书";break;
//                case "z8"       :   $key="院分团委委员、院学生会正部长、副部长";break;
//                case "z5"       :   $key="担任一年级的助班或导读";break;
//                case "z3"       :   $key="校、院系学生会、团委干事、班委；";break;
//                case "shsj"     :   $key="参加社会实践";break;
//                case "hjjn"     :   $key="焊接技能比赛";break;
//                case "wxdcx"    :   $key="无线电测向运动";break;
//                case "tzb"      :   $key="参加“挑战杯”项目的申报、新苗计划、春萌计划等";break;
//                case "zzjs"     :   $key="积极参加校组织及以上的各项竞赛但未获奖";break;
//                case "bhbs"     :   $key="电气学院举行的拔河比赛";break;
//                case "ydy"      :   $key="运动月";break;
//                case "hyjt"     :   $key="参加弘毅讲堂";break;
//                case "ydh"      :   $key="参加运动会项目";break;
//                case "5000"     :   $key="运动会5000米跑完全程";break;
//                case "1500"     :   $key="运动会女子1500米跑完全程";break;
//                case "fzgbc"    :   $key="运动会方阵、广播操";break;
//                case "ydhfzr"   :   $key="运动会负责人及其工作人员";break;
//                case "sjqs"     :   $key="院十佳寝室";break;
//                case "fzr"      :   $key="学院大型活动负责人";break;
//                case "wmqs"     :   $key="文明寝室";break;
//                case "wmqsry"   :   $key="进行文明寝室建设的人员";break;
//                case "beizhu"   :   $key='能力项目备注';
//                                    $val= str_replace("\n","<br />",$val);
//                                    break;
//                default:break;
//            }
//            echo "<tr><td>".$key."</td><td>".$val."</td></tr>";
//        }
//
//        $gx = $this->input->post('gx');
//        print_r($gx);
//        foreach($gx as $key=>$val) {
//            if (is_array($val)) {
//                echo "<tr><td>" . $key . "</td><td>" . $val['xmname'] . "</td><td>" . $val['lb'] . "</td><td>" . $val['sorce'] . "</td><td>" . $val['sorce'] * $val['lb'] . "</td></tr>";
//
//            }
//        }
//
//
//        echo "</table>";