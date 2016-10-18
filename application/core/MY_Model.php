<?php
/**
 * 所有Model类的父类，继承自该类的所有Model自动继承其中的一些公用的方法。
 * @author  lionel
 * @Date    2013-1-1        
 */
class MY_Model extends CI_Model {	

	/**
	 * 
	 * @var 表名，需要子类构造方法中定义
	 */
	protected $table_name;
	/**
	 * 
	 * @var 表名主键
	 */
	protected $id = 'id';
    
    /**
     * 通过主键返回数据
     * 
     * @Date    2013-1-1
     * @author  lionel
     *  
     * @param   int $id
     * @return  Object 满足条件的类
     */
	public final function get_by_id($id){	
			
			if(!is_array($id)){
				$id = array($this->get_id()=>$id);
			}	
			$result =  $this->db
							->from($this->table_name())
			                ->where($id)
			                ->get()->row();
			
			return $result;
	}
	/**
	 * 取得所有满足条件的数据
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param  Array $info 条件数组
	 * 
	 * @return Array 所有满足条件的数据
	 */
	public final function get_all($info=array()){
		
        $where    = isset($info['where']) ? $info['where'] : array();
        $nwhere   = isset($info['nwhere']) ? $info['nwhere'] : array();
        $order_by = isset($info['order_by']) ? $info['order_by'] : array();
        $limit    = isset($info['limit']) ? intval($info['limit']) :FALSE;
        $offset   = isset($info['offset']) ? intval($info['offset']) :0;
        
		$this->db
		     ->from($this->table_name())
		     ->where($where)
		     ->where($nwhere,NULL,FALSE);
		
		foreach ($order_by as $key => $value) {
			$this->db->order_by($key,$value);
		} 
		
		if($limit){
			$this->db->limit($limit,$offset);
		}
		return $this->db->get()->result();
		
	}
    
	/**
	 * 取得所有满足条件的数据个数
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param  Array $where 条件数组，只限定于相等的条件判断
	 * @param  Array $nwhere 条件数组，其他情况，例如包含< 或 >的情况
	 * 
	 * @return int 所有满足条件的数据个数
	 */
	public final function get_all_count($where = array(),$nwhere=array()){
			$count = $this->db
			 	          ->select('count(*) as cnt',FALSE)
						  ->from($this->table_name())
			              ->where($where)
			              ->where($nwhere,NULL,FALSE)
			              ->get()->row();
			return intval($count->cnt);
				
	}
	
	/**
	 * 删除满足条件的数据，不传递参数，删除所有数据
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param  Array  $where 条件数组，只限定于相等的条件判断
	 * @param  Array $nwhere 条件数组，其他情况，例如包含< 或 >的情况
	 * 
	 * @return int 删除的数据的个数 
	 */
	public final function delete_all($where = array(),$nwhere=array()){
		   if(count($where)=== 0 AND count($nwhere) === 0){
		   	   $this->db
			   	    ->from($this->table_name())
			   	    ->where('1=',1,FALSE)
		   	        ->delete();
		   }else{
			   $this->db
					->from($this->table_name())
					->where($where)
					->where($nwhere,NULL,FALSE)
			        ->delete();
		   }
		   return $this->db->affected_rows();		   
	}
	
	/**
	 * 根据主键删除数据
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param int $id 要删除的数据的主键 
	 * @return int 删除的数据的个数  0，未删除 1删除成功
	 */
	public final function delete_single($id){	
		$this->db->delete($this->table_name(), array($this->get_id() => intval($id))); 	
		return $this->db->affected_rows();
	}	
	
	
	/**
	 * 
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param int $id        更新数据的主键
	 * @param Array $data    更新的数据
	 * 
	 * @return int 更新的数据的个数  0，未删除 1删除成功
	 */
	public final function update_single($id,$data){
		$this->db
		      ->where($this->get_id(), intval($id))
		      ->update($this->table_name(), $data);		
		return $this->db->affected_rows();
	}
	
	/**
	 * 
	 * 更新所有满足条件的数据
	 * @Date 2013-1-1
	 * @author lionel
	 *  
     * @param  Array $where 条件数组，只限定于相等的条件判断
	 * @param  Array $nwhere 条件数组，其他情况，例如包含< 或 >的情况
     * @param  Array $data 要更新的数据
	 * @return int 更新的数据的个数
	 */
	public final function update_all($where,$data,$nwhere=array()){
		$this->db
		     ->where($where)
		     ->where($nwhere,NULL,FALSE)
		     ->update($this->table_name(), $data);

		return $this->db->affected_rows();
	}
	
	/**
	 * 添加一条数据
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *  
	 * @param Array $data 添加的数据
	 */
	public final function add_single($data){
		$this->db->insert($this->table_name(), $data);		
		return $this->db->insert_id();
	}
	
    /**
     * 
     * 
     * @Date 2013-1-1
     * @author lionel
     *  
     * @return string
     */
	protected final function get_id(){
		return $this->id;
	}
    
	/**
	 * 
	 * 
	 * @Date 2013-1-1
	 * @author lionel
	 *
	 */
	protected final function table_name(){
		return $this->table_name;
	}
}