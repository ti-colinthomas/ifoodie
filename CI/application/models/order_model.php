<?php
class Order_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor.
        parent::__construct();
    }
	
	function init_order($deviceId) {
		$order_info = array(
							'status' => 'open', 
							'deviceId' => $deviceId
							);
		$query = $this->db->insert('order', $order_info);
		
		$this->db->where($order_info);
		$query = $this->db->get('order');
		return $query->result();
	}
	
	function add_orderitem() {
		$order_item = array(
							'itemId' => $this->input->post('itemId'),
							'orderId' => $this->input->post('orderId'),
							'instructions' => $this->input->post('instructions'),
							'quantity' => $this->input->post('quantity'),
							'cost' => $this->input->post('cost'),
							'tableId' =>$this->input->post('tableId')
							);
		$query = $this->db->insert('itemOrder', $order_item);
	}
	
	function get_orderitems() {
		$query = $this->db->query('select i.name, io.quantity, io.cost, i.veg, i.cookingtime, i.likes, i.dislikes, i.itemid
								from itemDetails as i, itemOrder as io
								where i.itemid = io.itemid and io.orderid=' . $this->input->post('orderId') . ';'
								);
		return $query->result();
	}
	
	function remove_orderitem() {
		$this->db->delete('itemOrder', array(
											'itemId' => $this->input->post('itemId'),
											'orderId' => $this->input->post('orderId')
											));
	}
	
	function close_order() {
		$this->load->helper('date');			
		$datestring = "%Y-%m-%d %h:%i:%a";
		$time = time();
	
		$query = $this->db->query('SELECT SUM(cost) AS totalCost FROM `ifoodie`.`itemorder` where orderId=' . $this->input->post('orderId') . ';');
		$billCost =  $query->result();
		$closeOrder = array(
							'date' => mdate($datestring, $time),
							'paymentMethod' => 'CASH',
							'discount' => 0,
							'totalCost' => $billCost[0]->totalCost,
							'status' => 'closed'
							);
		$this->db->where('orderId',$this->input->post('orderId'));
		$this->db->update('order', $closeOrder);
		
		return $billCost[0]->totalCost;
	}
	
	function generate_orderinfo() {
		$query = $this->db->query('select orderid,sum(quantity) as "totalOrder", t.tablename
									from `itemorder` as io , `table` as t 
									where t.tableid = io.tableid
									group by orderid;'
								);
		return $query->result();
	}
	
	function generate_orderdetails() {
		$query = $this->db->query('select orderid, t.tablename, i.name, i.description, io.quantity, io.instructions, i.cost
									from `itemorder` as io , `table` as t, `itemdetails` as i
									where t.tableid = io.tableid and 
									io.itemid = i.itemid
									and orderid=' . $this->input->post('orderId') . ';'
								);
		return $query->result();
	}
}