<?php
require_once 'dao.php';
class HobbyService {
	private $dao;
	public function __construct() {
		$this->dao = new HobbyDao ();
	}
	public function getAll() {
		return $this->dao->selectAll ();
	}
}
class MemberService {
	private $dao;
	public function __construct() {
		$this->dao = new MemberDao ();
	}
	public function join($m) {
		$this->dao->insert ( $m );
	}
	public function login($id, $pwd) {
		$m = $this->dao->select ( $id );
		if ($m == null) {
			return 1;
		} else {
			if ($m->getPwd () == $pwd) {
				session_start ();
				$_SESSION ['id'] = $id;
				return 3;
			} else {
				return 2;
			}
		}
	}
	public function logout() {
		if (session_status () != PHP_SESSION_ACTIVE) { // 세션이 액티브가아닐때만 세션실행
			session_start (); // 로그인하고 로그아웃하면 세션시작이 중복됨
		}
		session_unset ();
		session_cache_expire ( 60 );
		session_destroy ();
	}
	public function out() {
		if (session_status () != PHP_SESSION_ACTIVE) { // 세션이 액티브가아닐때만 세션실행
			session_start (); // 로그인하고 로그아웃하면 세션시작이 중복됨
		}
		if (isset ( $_SESSION ['id'] )) {
			$this->dao->delete ( $_SESSION ['id'] );
			$this->logout ();
		}
	}
	public function editInfo($m) {
		$this->dao->update ( $m );
	}
	public function getMember($id){
		return $this->dao->select($id);
	}
}
?>