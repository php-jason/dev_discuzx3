<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: block_vote.php 31313 2012-08-10 03:51:03Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class block_vote extends discuz_block {
	var $setting = array();
	function block_vote() {
		global $_G;
		$this->setting = array(
			'aids'	=> array(
				'title' => 'articlelist_aids',
				'type' => 'text',
				'value' => ''
			),
			'uids'	=> array(
				'title' => 'articlelist_uids',
				'type' => 'text',
				'value' => ''
			),
			'keyword' => array(
				'title' => 'articlelist_keyword',
				'type' => 'text'
			),
			'tag' => array(
				'title' => 'articlelist_tag',
				'type' => 'mcheckbox',
				'value' => array(
				),
			),
			'picrequired' => array(
				'title' => 'articlelist_picrequired',
				'type' => 'radio',
				'default' => '0'
			),
			'starttime' => array(
				'title' => 'articlelist_starttime',
				'type' => 'calendar',
				'default' => ''
			),
			'endtime' => array(
				'title' => 'articlelist_endtime',
				'type' => 'calendar',
				'default' => ''
			),
			'picrequired' => array(
				'title' => 'articlelist_picrequired',
				'type' => 'radio',
				'default' => '0'
			),
			'orderby' => array(
				'title' => 'articlelist_orderby',
				'type' => 'mradio',
				'value' => array(
					array('dateline', 'articlelist_orderby_dateline'),
					array('viewnum', 'articlelist_orderby_viewnum'),
					array('commentnum', 'articlelist_orderby_commentnum'),
				),
				'default' => 'dateline'
			),
			'publishdateline' => array(
				'title' => 'articlelist_publishdateline',
				'type'=> 'mradio',
				'value' => array(
					array('0', 'articlelist_publishdateline_nolimit'),
					array('3600', 'articlelist_publishdateline_hour'),
					array('86400', 'articlelist_publishdateline_day'),
					array('604800', 'articlelist_publishdateline_week'),
					array('2592000', 'articlelist_publishdateline_month'),
				),
				'default' => '0'
			),
			'titlelength' => array(
				'title' => 'articlelist_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength'	=> array(
				'title' => 'articlelist_summarylength',
				'type' => 'text',
				'default' => 80
			),
			'startrow' => array(
				'title' => 'articlelist_startrow',
				'type' => 'text',
				'default' => 0
			),
		);
	}

	function name() {
		return '高級自定義';
		return lang('blockclass', 'blockclass_vote_script_vote');
	}

	function blockclass() {
		return array('vote', '投票模塊');
		return array('article', lang('blockclass', 'blockclass_portal_vote'));
	}

	function fields() {
		return array(
				'id' => array('name' => lang('blockclass', 'blockclass_field_id'), 'formtype' => 'text', 'datatype' => 'int'),
				'uid' => array('name' => lang('blockclass', 'blockclass_article_field_uid'), 'formtype' => 'text', 'datatype' => 'int'),
				'username' => array('name' => lang('blockclass', 'blockclass_article_field_username'), 'formtype' => 'text', 'datatype' => 'string'),
				'url' => array('name' => lang('blockclass', 'blockclass_article_field_url'), 'formtype' => 'text', 'datatype' => 'string'),
				'title' => array('name' => lang('blockclass', 'blockclass_article_field_title'), 'formtype' => 'title', 'datatype' => 'title'),
				'pic' => array('name' => lang('blockclass', 'blockclass_article_field_pic'), 'formtype' => 'pic', 'datatype' => 'pic'),
				'summary' => array('name' => lang('blockclass', 'blockclass_article_field_summary'), 'formtype' => 'summary', 'datatype' => 'summary'),
				'dateline' => array('name' => lang('blockclass', 'blockclass_article_field_dateline'), 'formtype' => 'date', 'datatype' => 'date'),
				'voters' => array('name' => '參與數', 'formtype' => 'text', 'datatype' => 'string'),
				'votes_1' => array('name' => '選項得票数', 'formtype' => 'text', 'datatype' => 'string'),
				'votes_2' => array('name' => '選項得票数', 'formtype' => 'text', 'datatype' => 'string'),
				'votes_3' => array('name' => '選項得票数', 'formtype' => 'text', 'datatype' => 'string'),
				'votes_4' => array('name' => '選項得票数', 'formtype' => 'text', 'datatype' => 'string'),
				'percentage_1' => array('name' => '所佔權重', 'formtype' => 'text', 'datatype' => 'int'),
				'percentage_2' => array('name' => '所佔權重', 'formtype' => 'text', 'datatype' => 'int'),
				'percentage_3' => array('name' => '所佔權重', 'formtype' => 'text', 'datatype' => 'int'),
				'percentage_4' => array('name' => '所佔權重', 'formtype' => 'text', 'datatype' => 'int'),
			);
	}

	function fieldsconvert() {
		return array();
//转换
		return array(
				'forum_thread' => array(
					'name' => lang('blockclass', 'blockclass_forum_thread'),
					'script' => 'thread',
					'searchkeys' => array('username', 'uid', 'caturl', 'catname', 'articles', 'viewnum', 'commentnum'),
					'replacekeys' => array('author', 'authorid', 'forumurl', 'forumname', 'posts', 'views', 'replies'),
				),
				'group_thread' => array(
					'name' => lang('blockclass', 'blockclass_group_thread'),
					'script' => 'groupthread',
					'searchkeys' => array('username', 'uid', 'caturl', 'catname', 'articles', 'viewnum', 'commentnum'),
					'replacekeys' => array('author', 'authorid', 'groupurl', 'groupname', 'posts', 'views', 'replies'),
				),
				'space_blog' => array(
					'name' => lang('blockclass', 'blockclass_space_blog'),
					'script' => 'blog',
					'searchkeys' => array('commentnum'),
					'replacekeys' => array('replynum'),
				),
			);
	}

	function getsetting() {
		global $_G;
		$settings = $this->setting;

		if($settings['tag']) {
			$tagnames = article_tagnames();
			foreach($tagnames as $k=>$v) {
				$settings['tag']['value'][] = array($k, $v);
			}
		}
		return $settings;
	}

	function getdata($style, $parameter) {
		global $_G;
		require_once libfile('function/portal');

		$parameter = $this->cookparameter($parameter);
		$aids		= !empty($parameter['aids']) ? explode(',', $parameter['aids']) : array();
		$uids		= !empty($parameter['uids']) ? explode(',', $parameter['uids']) : array();
		$keyword	= !empty($parameter['keyword']) ? $parameter['keyword'] : '';
		$tag		= !empty($parameter['tag']) ? $parameter['tag'] : array();
		$starttime	= !empty($parameter['starttime']) ? strtotime($parameter['starttime']) : 0;
		$endtime	= !empty($parameter['endtime']) ? strtotime($parameter['endtime']) : 0;
		$publishdateline	= isset($parameter['publishdateline']) ? intval($parameter['publishdateline']) : 0;
		$startrow	= isset($parameter['startrow']) ? intval($parameter['startrow']) : 0;
		$items		= isset($parameter['items']) ? intval($parameter['items']) : 10;
		$titlelength = isset($parameter['titlelength']) ? intval($parameter['titlelength']) : 40;
		$summarylength = isset($parameter['summarylength']) ? intval($parameter['summarylength']) : 80;

		$picrequired = !empty($parameter['picrequired']) ? 1 : 0;

		$list = array();
		$wheres = array();

		$wheres[] = "at.status='0'";

		$wheresql = $wheres ? implode(' AND ', $wheres) : '1';
   
    $mids = $aids;
    foreach($mids as $k => $v){
       $thread = DB::fetch_first("SELECT * FROM ".DB::table('forum_thread')." WHERE closed='0' AND  tid= ".$v." LIMIT 1");
       if( !$thread){
          continue;
       }
       $poll = DB::fetch_first("SELECT * FROM ".DB::table('forum_poll')." WHERE tid= ".$v." LIMIT 1");
       if( !$poll){
          continue;
       }
       $pollopt = DB::fetch_first("SELECT SUM(`votes`) as total FROM ".DB::table('forum_polloption')." WHERE tid= ".$v." ");
       $n = 1;$poptionlist = array();
		   $query = DB::query("SELECT pi.*,p.votes,p.polloption,p.voterids FROM ".DB::table('forum_polloption_image')." as pi RIGHT JOIN ".DB::table('forum_polloption')." as p ON pi.poid = p.polloptionid WHERE p.tid = ".$v." ORDER BY p.displayorder ");
 		   while($data = DB::fetch($query)) {
          $poptionlist['voters'] = $poll['voters'];
          $poptionlist['polloption_'.$n] = $data['polloption'];
          $poptionlist['votes_'.$n] = $data['votes'];
          $poptionlist['percentage_'.$n] = $pollopt['total'] ? sprintf('%.1f',intval($data['votes'])/intval($pollopt['total']) * 100) : 0;
          
		      if(empty($thread['pic'])) {
				    $thread['pic'] = STATICURL.'image/common/nophoto.gif';
				    $thread['picflag'] = '0';
			    } else {
				    $thread['pic'] = $thread['pic'];
				    $thread['picflag'] = $thread['remote'] == '1' ? '2' : '1';
			    }
          $n++;
       }
			$list[] = array(
				'id' => $thread['aid'],
				'idtype' => 'aid',
				'title' => cutstr($thread['title'], $titlelength, ''),
				'url' => fetch_article_url($thread),
				'pic' => $thread['pic'],
				'picflag' => $thread['picflag'],
				'summary' => cutstr(strip_tags($thread['summary']), $summarylength, ''),
				'fields' => $poptionlist
			);
		}
		return array('html' => '', 'data' => $list);
	}

	function getmaxid() {
		loadcache('databasemaxid');
		$data = getglobal('cache/databasemaxid');
		if(!isset($data['article']) || TIMESTAMP - $data['article']['dateline'] >= 86400) {
			$data['article']['dateline'] = TIMESTAMP;
			$data['article']['id'] = DB::result_first('SELECT MAX(aid) FROM '.DB::table('portal_vote_title'));
			savecache('databasemaxid', $data);
		}
		return $data['article']['id'];
	}

}

?>
