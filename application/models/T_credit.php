<?php
/**
 * Created by IntelliJ IDEA.
 * User: kindai
 * Date: 23/10/16
 * Time: 11:16 PM
 */
class T_credit extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    public function insertCredit($userId, $credit)
    {
        $this->load->model('t_user');
        $arr = $this->t_user->get_user($userId);
        $grade = $this->selectGrade($arr[0]->TOTALCREDIT + $credit);
        $this->db->set(array('credit' => $arr[0]->CREDIT + $credit, 'totalcredit' => $arr[0]->TOTALCREDIT + $credit, 'grade' => $grade));
        $this->db->where('user_id', $userId);
        $this->db->update('t_user');
    }

    private function selectGrade($credit)
    {
        $this->db->select('t_grade.*');
        $this->db->from('t_grade');
        $query = $this->db->get();
        $a;
        foreach ($query->result() as $row) {
            if ($credit >= $row->CREDIT) {
                $a = $row->GRADE;
            } else {
                break;
            }
        }
        return $a;
    }
}