<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('portalcp_block');
0
|| checktplrefresh('./template/default/portal/portalcp_block.htm', './template/default/portal/portalcp_block_setting.htm', 1388020616, '1', './data/template/1_1_portal_portalcp_block.tpl.php', './template/default', 'portal/portalcp_block')
|| checktplrefresh('./template/default/portal/portalcp_block.htm', './template/default/portal/portalcp_block_thumbsetting.htm', 1388020616, '1', './data/template/1_1_portal_portalcp_block.tpl.php', './template/default', 'portal/portalcp_block')
|| checktplrefresh('./template/default/portal/portalcp_block.htm', './template/default/portal/portalcp_block_setting.htm', 1388020616, '1', './data/template/1_1_portal_portalcp_block.tpl.php', './template/default', 'portal/portalcp_block')
|| checktplrefresh('./template/default/portal/portalcp_block.htm', './template/default/portal/portalcp_block_thumbsetting.htm', 1388020616, '1', './data/template/1_1_portal_portalcp_block.tpl.php', './template/default', 'portal/portalcp_block')
|| checktplrefresh('./template/default/portal/portalcp_block.htm', './template/default/portal/portalcp_nav.htm', 1388020616, '1', './data/template/1_1_portal_portalcp_block.tpl.php', './template/default', 'portal/portalcp_block')
;?><?php include template('common/header'); if(!$_G['inajax'] && in_array($op, array('block', 'data', 'itemdata'))) { ?>
<div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首頁"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="<?php echo $_G['setting']['navs']['1']['filename'];?>"><?php echo $_G['setting']['navs']['1']['navname'];?></a> <em>&rsaquo;</em>
<a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>門戶管理<?php } else { ?>模塊管理<?php } ?></a> <em>&rsaquo;</em>
<a href="portal.php?mod=portalcp&amp;ac=portalblock">模塊管理</a>
<?php if($bid) { ?> <em>&rsaquo;</em><a href="portal.php?mod=portalcp&amp;ac=block&amp;op=block&amp;bid=<?php echo $bid;?>"><?php if($block['name']) { ?><?php echo $block['name'];?><?php } else { ?># <?php echo $block['bid'];?><?php } ?></a><?php } ?>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<div id="block_selection">

<ul class="tb cl">
<?php if($allowmanage) { ?>
<li id="li_setting"<?php if($op=="block") { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid=<?php echo $bid;?>&amp;op=block<?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>">模塊屬性</a></li>
<?php } if($bid && !$is_htmlblock) { if($allowmanage || $allowdata) { ?>
<li id="li_data"<?php if($op=="data") { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid=<?php echo $bid;?>&amp;op=data<?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>">模塊數據</a></li>
<?php } } if($is_recommendable) { ?>
<li id="li_itemdata"<?php if($op=="itemdata") { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid=<?php echo $bid;?>&amp;op=itemdata<?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>">推送庫</a></li>
<?php } if($op == 'data' && ($allowmanage || $allowdata)) { ?>
<button class="pn pnc y" title="添加數據" onclick="showWindow('<?php echo $_GET['handlekey'];?>', 'portal.php?mod=portalcp&ac=block&bid=<?php echo $bid;?>&op=additem<?php if($_G['inajax']) { ?>&itemfrom=ajax<?php } if($_GET['from']) { ?>&from=<?php echo $_GET['from'];?><?php } ?>')"><em>添加</em></button>
<?php } ?>
</ul>
<?php } if($_G['inajax'] && in_array($op, array('block', 'data', 'style', 'moreurl'))) { ?>
<script type="text/javascript" reload="1">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
<?php if($_GET['from']=='cp') { ?>
location.reload();
<?php } else { ?>
var bid = values['bid'];
var eleid = typeof values['eleid'] == 'undefined' ? 0 : values['eleid'];
var x = new Ajax();
var openTitle = 0;
drag.setClose();
x.get('portal.php?mod=portalcp&ac=block&op=getblock&forceupdate=1&bid='+bid+'&tpl=<?php echo $_GET['tpl'];?>&inajax=1<?php if($_GET['from']) { ?>&from=<?php echo $_GET['from'];?><?php } ?>', function(s) {
var obj = document.createElement('div');
bid = 'portal_block_'+bid;
obj.innerHTML = s;
if ($(bid) != null) {
drag.stopSlide(bid);
if($(bid+'_content')) $(bid+'_content').parentNode.removeChild($(bid+'_content'));
$(bid).innerHTML = obj.childNodes[0].innerHTML;
if(s.indexOf('runslideshow();') > 0) {
runslideshow();
}
} else {
$(eleid).parentNode.replaceChild(obj.childNodes[0],$(eleid));
openTitle = 1;
}
drag.initPosition();
evalscript(s);
if (openTitle == 1)	drag.openTitleEdit(bid);
});
<?php } ?>
hideWindow('<?php echo $_GET['handlekey'];?>');
}
</script><?php
$blocknav = <<<EOF


EOF;
 if($allowmanage) { 
$blocknav .= <<<EOF

<li id="li_setting"
EOF;
 if($op=="block") { 
$blocknav .= <<<EOF
 class="a"
EOF;
 } 
$blocknav .= <<<EOF
><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid={$bid}&amp;op=block
EOF;
 if($_GET['from']) { 
$blocknav .= <<<EOF
&amp;from={$_GET['from']}
EOF;
 } 
$blocknav .= <<<EOF
" onclick="showWindow('{$_GET['handlekey']}', this.getAttribute('href'));">模塊屬性</a></li>

EOF;
 } if($bid && !$is_htmlblock) { if($allowmanage || $allowdata) { 
$blocknav .= <<<EOF

<li id="li_data"
EOF;
 if($op=="data") { 
$blocknav .= <<<EOF
 class="a"
EOF;
 } 
$blocknav .= <<<EOF
><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid={$bid}&amp;op=data
EOF;
 if($_GET['from']) { 
$blocknav .= <<<EOF
&amp;from={$_GET['from']}
EOF;
 } 
$blocknav .= <<<EOF
" onclick="showWindow('{$_GET['handlekey']}', this.getAttribute('href'));">模塊數據</a></li>

EOF;
 } if($allowmanage) { 
$blocknav .= <<<EOF

<li id="li_style"
EOF;
 if($op=="style") { 
$blocknav .= <<<EOF
 class="a"
EOF;
 } 
$blocknav .= <<<EOF
><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid={$bid}&amp;op=style
EOF;
 if($_GET['from']) { 
$blocknav .= <<<EOF
&amp;from={$_GET['from']}
EOF;
 } 
$blocknav .= <<<EOF
" onclick="showWindow('{$_GET['handlekey']}', this.getAttribute('href'));">模塊模板</a></li>

EOF;
 if($block['moreurl']) { 
$blocknav .= <<<EOF

<li id="li_moreurl"
EOF;
 if($op=="moreurl") { 
$blocknav .= <<<EOF
 class="a"
EOF;
 } 
$blocknav .= <<<EOF
><a href="portal.php?mod=portalcp&amp;ac=block&amp;bid={$bid}&amp;op=moreurl
EOF;
 if($_GET['from']) { 
$blocknav .= <<<EOF
&amp;from={$_GET['from']}
EOF;
 } 
$blocknav .= <<<EOF
" onclick="showWindow('{$_GET['handlekey']}', this.getAttribute('href'));">更多頁設置</a></li>

EOF;
 } } } 
$blocknav .= <<<EOF


EOF;
?>
<?php } if($op == 'block') { if($_G['inajax']) { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">編輯模塊</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');<?php if(empty($bid) && $_GET['from']!='cp') { ?>drag.removeBlock('<?php echo $_GET['eleid'];?>',true);<?php } ?>return false;" title="關閉">關閉</a></span>
</h3>
<ul class="tb cl">
<?php echo $blocknav;?>
</ul>
<?php } ?>
<form id="blockformsetting" name="blockformsetting" method="post" enctype="multipart/form-data" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=block&amp;classname=<?php echo $_GET['classname'];?>&amp;bid=<?php echo $block['bid'];?>&amp;blocktype=<?php echo $blocktype;?>&amp;eleid=<?php echo $_GET['eleid'];?>&amp;tpl=<?php echo $_GET['tpl'];?>"<?php if($_G['inajax']) { ?> onsubmit="if(checkblockname(this)){ajaxpost('blockformsetting','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');} else {return false;}"<?php } else { ?> onsubmit="return checkblockname(this);"<?php } ?> class="fdiy">
<div class="c diywin"<?php if($_G['inajax']) { ?> style="width: 490px; <?php if($_GET['from']=='cp') { ?>max-height:260px;<?php } else { ?>max-height:380px;<?php } ?>height:auto !important; <?php if($_GET['from']=='cp') { ?>height:260px;<?php } else { ?>height:380px;<?php } ?> _padding-right: 17px; overflow-x: hidden; overflow-y: auto;"<?php } ?>>
<div id="block_setting">
<table class="tfm mbm">
<?php if($showhtmltip) { ?>
<tr>
<td colspan="2" style="color: red">
此模塊數據由屬性決定，請編輯屬性以展示需要的數據</td>
</tr>
<?php } ?>
<tr>
<th width="80">模塊標識</th>
<td>
<input type="text" id="name" name="name" value="<?php echo $block['name'];?>" class="px" />
<script type="text/javascript">document.forms['blockformsetting']['name'].focus();</script>
</td>
</tr>
<tr>
<th width="80">模塊分類</th>
<td><?php list($bigclass) = explode('_',$block['blockclass']);?><?php if(!empty($_G['cache']['blockconvert']) && !empty($_G['cache']['blockconvert'][$bigclass][$block['blockclass']])) { ?>
<select name="toblockclass" onchange="blockconver(this, '<?php echo $block['bid'];?>');" class="ps">
<option value="<?php echo $block['blockclass'];?>"><?php echo $blockclassname;?></option><?php if(is_array($_G['cache']['blockconvert'][$bigclass][$block['blockclass']])) foreach($_G['cache']['blockconvert'][$bigclass][$block['blockclass']] as $bblockclass => $convertarr) { ?><option value="<?php echo $bblockclass;?>"><?php echo $convertarr['name'];?></option>
<?php } ?>
</select>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="此模塊分類支持轉換模塊的類型，但<font color='red'>可能會存在部分特殊字段的丟失且模塊的顯示樣式將會變為自定義模板</font>，請根據需要使用。<br/><font color='red'>注意：</font>選擇下拉列表中的模塊類型以後模塊分類立即發生改變。" />
<?php } else { ?>
<?php echo $blockclassname;?>
<?php } ?>
</td>
</tr>
<tr>
<th width="80">數據來源</th>
<td>
<select name="script" onchange="block_get_setting('<?php echo $_GET['classname'];?>', this.value, '<?php echo $block['bid'];?>');" class="ps"><?php if(is_array($theclass['script'])) foreach($theclass['script'] as $bkey => $bname) { ?><option value="<?php echo $bkey;?>"<?php echo $scriptarr[$bkey];?>><?php echo $bname;?></option>
<?php } ?>
</select>
<?php if($is_recommendable) { ?>
&nbsp;<label><input type="checkbox" name="isblank" id="isblank" class="pc" value="1" <?php if($block['isblank']) { ?> checked<?php } ?> onclick="switchSetting();" />只接受推送數據</label>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="勾選此項，則該模塊只顯示推送的數據，不自動聚合數據" />
<?php } ?>
</td>
</tr>
<tr class="l">
<th></th>
<td>
<a id="a_setting_show" href="javascript:;" onclick="toggleSettingShow();"class="xi2">收起設置項</a>
</td>
</tr>
<tbody id="tbody_setting"<?php if($block['isblank']) { ?> style="display:none;"<?php } ?>><?php if(is_array($settings)) foreach($settings as $key => $value) { ?><tr class="vt">
<th><?php echo $value['title'];?><?php if($value['comment']) { ?> <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" style="margin: 0;" onmouseover="showTip(this)" tip="<?php echo $value['comment'];?>" /><?php } ?></th>
<td><?php echo $value['html'];?></td>
</tr>
<?php } ?></tbody>
<?php if(!$is_htmlblock) { ?>
<tr>
<th>顯示條數</th>
<td><input type="text" name="shownum" value="<?php echo $block['shownum'];?>" class="px" /></td>
</tr>
<?php } if(!$nocachetime) { ?>
<tr>
<th width="80">數據緩存更新</th>
<td>
<span><input type="text" name="cachetime" id="txt_cachetime" class="px" size="4" maxlength="6" value="<?php echo $block['cachetime_min'];?>" /> 分鐘</span>
<span id="tbody_range"<?php if($block['punctualupdate']) { ?> style="visibility:hidden;"<?php } ?>>
&nbsp; 更新區間
<select name="cachetimerangestart" class="ps vm" ><?php if(is_array($cachetimerange)) foreach($cachetimerange as $value) { ?><option value="<?php echo $value;?>" <?php if($value == $block['cachetimerange']['0']) { ?> selected="selected"<?php } ?>><?php echo $value;?>點</option>
<?php } ?>
</select> -
<select name="cachetimerangeend" class="ps vm" ><?php if(is_array($cachetimerange)) foreach($cachetimerange as $value) { ?><option value="<?php echo $value;?>" <?php if($value == $block['cachetimerange']['1']) { ?> selected="selected"<?php } ?>><?php echo $value;?>點</option>
<?php } ?>
</select>
</span>
</p>
<p class="ptn xi2">
<a href="javascript:;" onclick="blockSetCacheTime(10);this.blur();">10分鐘</a>&nbsp;
<a href="javascript:;" onclick="blockSetCacheTime('60');this.blur();">1小時</a>&nbsp;
<a href="javascript:;" onclick="blockSetCacheTime('1440');this.blur();">1天</a>&nbsp;
<label for="ckpunctualupdate"><input type="checkbox" name="punctualupdate" id="ckpunctualupdate" class="pc" onclick="$('tbody_range').style.visibility = (this.checked ? 'hidden' : 'visible');" value="1"<?php if($block['punctualupdate']) { ?> checked="checked"<?php } ?> />準時更新</label>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="為了減輕系統負載，系統設定為同一時間最多只更新一個模塊；勾選此項可以忽略此優化，保證模塊按指定緩存時間及時更新(警告：這會嚴重加重系統負載！不要同一頁面內設置大量「準時更新」模塊！)" />
<span class="pipe">|</span>
<a href="javascript:;" onclick="blockSetCacheTime('0');this.blur();">不自動更新</a>&nbsp;
<a href="javascript:;" onclick="blockSetCacheTime('-1');this.blur();">永不更新</a>
</p>
</td>
</tr>
<?php } if(!$is_htmlblock) { ?>
<tr>
<th width="80">顯示樣式</th>
<td>
<select name="styleid" onchange="block_show_thumbsetting('<?php echo $_GET['classname'];?>', this.value, '<?php echo $block['bid'];?>')" class="ps">
<?php if($bid && $block['styleid']==0) { ?>
<option value="0" selected>自定義模板</option>
<?php } if(is_array($theclass['style'])) foreach($theclass['style'] as $key => $value) { $thestyle = count($thestyle) > 1 ? $thestyle : $theclass['style'][$key];?><option value="<?php echo $key;?>"<?php echo $stylearr[$key];?>><?php echo $value['name'];?></option>
<?php } ?>
</select>
<?php if($blocktype) { ?>
&nbsp;&nbsp;
<label for="ck_hidedisplay"><input type="checkbox" name="hidedisplay" id="ck_hidedisplay" class="pc" value="1"<?php if($block['hidedisplay']) { ?> checked="checked"<?php } ?> />隱藏輸出</label>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="不輸出模塊內容；而是提供數據供模板調用。" />
<?php } ?>
</td>
</tr>

<?php } ?>
<tbody id="tbody_thumbsetting"><?php if($thestyle['makethumb']) { ?>
<tr>
<th width="80">縮略圖寬度</th>
<td><input type="text" name="picwidth" value="<?php echo $block['picwidth'];?>" class="px" /></td>
</tr>
<tr>
<th width="80">縮略圖高度</th>
<td><input type="text" name="picheight" value="<?php echo $block['picheight'];?>" class="px" /></td>
</tr>
<?php } if($thestyle['settarget']) { ?>
<tr>
<th width="80">鏈接打開方式</th>
<td>
<select name="a_target">
<option value="blank" <?php echo $targetarr['blank'];?>>新鏈接打開</option>
<option value="self" <?php echo $targetarr['self'];?>>本頁面打開</option>
<option value="top" <?php echo $targetarr['top'];?>>本頁面打開(跳出框架)</option>
</select>
</td>
</tr>
<?php } if(!$is_htmlblock) { ?>
<tr>
<th width="80">日期格式</th>
<td>
<select name="dateformat"><?php if(is_array($dateformats)) foreach($dateformats as $value) { ?><option value="<?php echo $value['format'];?>"<?php echo $value['selected'];?>><?php echo $value['time'];?></option>
<?php } ?>
</select>
&nbsp;
<label for="ckdateuformat"><input type="checkbox" name="dateuformat" id="ckdateuformat" class="pc" value="1"<?php if($block['dateuformat']) { ?> checked="checked"<?php } ?> />使用人性化日期格式</label>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" style="margin: 0;" onmouseover="showTip(this)" tip="勾選此項，則最近的時間顯示「幾天前」的形式" />
</td>
</tr>
<?php } ?></tbody>
<?php if(!$is_htmlblock) { ?>
<tr>
<th width="80">自定義內容</th>
<td>
<textarea name="summary" id="block_sumamry_content" cols="40" rows="3" class="pt mbn" style="display:none"><?php echo $block['summary'];?></textarea>
<p class="pns">
<button type="button" id="a_summary_show" class="pn" onclick="showBlockSummary();"><em>編輯自定義內容</em></button>
<button type="button" id="a_summary_hide" class="pn" onclick="hideBlockSummary();" style="display:none;"><span>隱藏</span></a>
</p>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="o pns">
<input type="hidden" name="blocksubmit" value="true" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="eleid" value="<?php echo $_GET['eleid'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>確定</strong></button>
<?php if($_G['inajax']) { ?><button type="button" class="pn" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');<?php if(empty($bid) && $_GET['from']!='cp') { ?>drag.removeBlock('<?php echo $_GET['eleid'];?>',true);<?php } ?>return false;"><strong>取消</strong></button><?php } ?>
</div>
</form>
<?php } elseif($op == 'data') { if($_G['inajax']) { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">模塊數據</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');<?php if(empty($bid)) { ?>drag.removeBlock('<?php echo $_GET['eleid'];?>',true);<?php } ?>return false;" title="關閉">關閉</a></span>
</h3>
<ul class="tb cl">
<?php echo $blocknav;?>
<button class="pn pnc y" title="添加數據" onclick="showWindow('<?php echo $_GET['handlekey'];?>', 'portal.php?mod=portalcp&ac=block&bid=<?php echo $bid;?>&op=additem<?php if($_G['inajax']) { ?>&itemfrom=ajax<?php } if($_GET['from']) { ?>&from=<?php echo $_GET['from'];?><?php } ?>')"><em>添加</em></button>
</ul>
<?php } ?>
<form id="blockformdata" name="blockformdata" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=data&amp;classname=<?php echo $_GET['classname'];?>&amp;bid=<?php echo $block['bid'];?>&amp;eleid=<?php echo $_GET['eleid'];?>&amp;tpl=<?php echo $_GET['tpl'];?>"<?php if($_G['inajax']) { ?> onsubmit="ajaxpost('blockformdata','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');"<?php } ?>>
<div class="c"<?php if($_G['inajax']) { ?> style="width:490px; <?php if($_GET['from']=='cp') { ?>max-height:260px;<?php } else { ?>max-height:380px;<?php } ?>height:auto !important;<?php if($_GET['from']=='cp') { ?>height:260px;<?php } else { ?>height:380px;<?php } ?> _padding-right: 17px; overflow-x: hidden; overflow-y: auto;"<?php } ?>>
<div id="block_data">
<table class="dt mtm mbm" style="table-layout:fixed">
<tr>
<th width="34">固定</th>
<th width="50">位置</th>
<th>標題</th>
<th width="80">操作</th>
</tr>
<?php if($itemlist) { if(is_array($itemlist)) foreach($itemlist as $item) { ?><tr>
<?php if($item['ispreorder']) { ?>
<td>預訂</td>
<td><?php echo $item['displayorder'];?></td>
<?php } else { ?>
<td><input type="checkbox" name="locked[<?php echo $item['itemid'];?>]" value="1"<?php if($item['itemtype']=='1') { ?> checked="checked"<?php } ?> /></td>
<td><input type="text" name="displayorder[<?php echo $item['itemid'];?>]" class="px" size="2" maxlength="2" value="<?php echo $item['displayorder'];?>" /></td>
<?php } ?>
<td>[<?php echo $item['itemtypename'];?>] <?php echo $item['title'];?></td>
<td>
<a href="portal.php?mod=portalcp&amp;ac=block&amp;op=item&amp;bid=<?php echo $block['bid'];?>&amp;itemid=<?php echo $item['itemid'];?><?php if($_G['inajax']) { ?>&amp;itemfrom=ajax<?php } if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('showblock', this.getAttribute('href'));">編輯</a><span class="pipe">|</span>
<?php if($item['itemtype']=='1') { ?>
<a href="javascript:;" onclick="block_delete_item('<?php echo $block['bid'];?>', '<?php echo $item['itemid'];?>', 1, '<?php if($_G['inajax']) { ?>ajax<?php } ?>', '<?php if($_GET['from']) { ?><?php echo $_GET['from'];?><?php } ?>'); return false;">刪除</a>
<?php } else { ?>
<a href="javascript:;" onclick="block_delete_item('<?php echo $block['bid'];?>', '<?php echo $item['itemid'];?>', 0, '<?php if($_G['inajax']) { ?>ajax<?php } ?>', '<?php if($_GET['from']) { ?><?php echo $_GET['from'];?><?php } ?>'); return false;">屏蔽</a>
<?php } ?>
</td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="4"><p class="emp">沒有相關數據</p></td>
</tr>
<?php } ?>
</table>
<?php if($block['param']['bannedids']) { ?>
<h4><a href="javascript:;" onclick="display('p_bannedids');return false;">查看屏蔽數據</a></h4>
<p id="p_bannedids" style="display:none;">
<label>屏蔽數據</label>
<input type="text" name="bannedids" id="bannedids" class="px" value="<?php echo $block['param']['bannedids'];?>" />
<button type="button" class="pn pnc" id="bannedidssubmit" onclick="blockbanids('<?php echo $block['bid'];?>');" ><strong>保存</strong></button>
</p>
<?php } ?>
</div>
</div>
<?php if($_G['inajax'] || $itemlist) { ?>
<div class="o pns">
<input type="hidden" name="eleid" value="<?php echo $_GET['eleid'];?>" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="updatesubmit" value="true" />
<input type="hidden" name="modifiedids" value="" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn xg1" id="blockformdatasubmit" disabled="disabled"><strong>保存</strong></button>
<?php if($_G['inajax']) { ?><button type="button" class="pn" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;"><strong>取消</strong></button><?php } ?>
</div>
<?php } ?>
</form>
<script type="text/javascript" reload="1">
var formoldvalue = {'checkbox':[], 'text':[]};
var inputs = $('blockformdata').getElementsByTagName('table')[0].getElementsByTagName('input');
for(var i = 0; i < inputs.length; i++){
if(inputs[i]['type'].toLowerCase() == 'checkbox') {
formoldvalue['checkbox'][inputs[i]['name']] = inputs[i].checked;
_attachEvent(inputs[i], 'click', formcheckvalue);
} else if(inputs[i]['type'].toLowerCase() == 'text') {
formoldvalue['text'][inputs[i]['name']] = inputs[i].value;
_attachEvent(inputs[i], 'keyup', formcheckvalue);
_attachEvent(inputs[i], 'blur', formcheckvalue);
}
}

function formcheckvalue(){
var modifiedids = [];
var enabled = false;
for(i = 0; i < inputs.length; i++){
if(inputs[i]['type'].toLowerCase() == 'checkbox') {
if(formoldvalue['checkbox'][inputs[i]['name']] != inputs[i].checked){
enabled = true;
}
} else if(inputs[i]['type'].toLowerCase() == 'text') {
if(formoldvalue['text'][inputs[i]['name']] != inputs[i].value){
enabled = true;
var itemid = inputs[i]['name'].match(/\d+/);
if(itemid && itemid[0]) {
modifiedids.push(itemid[0]);
}
}
}
}
if(enabled) {
$('blockformdatasubmit').disabled = '';
$('blockformdatasubmit').className = $('blockformdatasubmit').className.replace(' xg1', ' pnc');
} else{
$('blockformdatasubmit').disabled = 'disabled';
$('blockformdatasubmit').className = $('blockformdatasubmit').className.replace(' pnc', ' xg1');
}
$('blockformdata')['modifiedids'].value = modifiedids+'';
}

function blockbanids(bid) {
var x = new Ajax();
x.get('portal.php?mod=portalcp&ac=block&op=banids&inajax=1&bid='+bid+'&bannedids='+$('bannedids').value, function(s){
<?php if($_G['inajax']) { ?>
succeedhandle_<?php echo $_GET['handlekey'];?> ('', '', {'bid':bid});
showWindow('showblock', 'portal.php?mod=portalcp&ac=block&op=data&bid='+bid+'&tpl='+document.diyform.template.value, 'get', -1);
<?php } else { ?>
location.reload();
<?php } ?>
});
}
</script>

<?php } elseif($op == 'style') { if($_G['inajax']) { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">模塊模板</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');<?php if(empty($bid)) { ?>drag.removeBlock('<?php echo $_GET['eleid'];?>',true);<?php } ?>return false;" title="關閉">關閉</a></span>
</h3>
<ul class="tb cl">
<?php echo $blocknav;?>
</ul>
<?php } ?>
<form id="blockstyleform" name="blockformdata" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=style&amp;classname=<?php echo $_GET['classname'];?>&amp;bid=<?php echo $block['bid'];?>&amp;eleid=<?php echo $_GET['eleid'];?>&amp;tpl=<?php echo $_GET['tpl'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>"<?php if($_G['inajax']) { ?> onsubmit="ajaxpost('blockstyleform','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');"<?php } ?>>
<div class="c"<?php if($_G['inajax']) { ?> style="width:490px; <?php if($_GET['from']=='cp') { ?>max-height:260px;<?php } else { ?>max-height:380px;<?php } ?>height:auto !important; <?php if($_GET['from']=='cp') { ?>height:260px;<?php } else { ?>height:380px;<?php } ?> _padding-right: 17px; overflow-x: hidden; overflow-y: auto;"<?php } ?>>
<?php if($block['hidedisplay']) { ?>
<div>
<p style="color:red;">提醒： 您選擇了隱藏輸出，模塊不會輸出任何內容；但是您可以在頁面模板中調用模塊的數據。</p>
<p>	<b>參考調用格式:</b></p>
<p><?php echo $samplecode;?></p>
<p><b>可調用字段:</b></p>
<table width="100%"><?php if(is_array($theclass['fields'])) foreach($theclass['fields'] as $key => $value) { ?> <tr>
 <td><?php echo $value['name'];?></td>
 <td><?php echo '$'; ?><?php echo $key;?></td>
 </tr>
 <?php } ?>
</table>
</div>
<?php } else { ?>
 <div id="block_style">
<p class="pns mtn mbn"><button type="button" id="a_summary_show" onclick="$('stylename').style.display='';" class="pn"><em>模板另存為...</em></button></p>
<p class="mtn mbm" id="stylename" style="display:none;">
模塊模板名稱: <input type="text" name="name" class="px" />
<br />
輸入名稱將此樣式保存到公共模塊模板(以便在其他模塊中使用)
</p>
<textarea name="template" rows="8" class="pt" style="width: 98%;"><?php echo $template;?></textarea>
</div>
<table class="dt mtm mbm">
<tr>
 <th>語法</th>
 <th>語句</th>
</tr><?php if(is_array($theclass['fields'])) foreach($theclass['fields'] as $key => $value) { ?><tr>
<td><?php echo $value['name'];?></td>
<td>{<?php echo $key;?>}</td>
</tr>
<?php } if(in_array($block['blockclass'], array('forum_thread', 'portal_article', 'group_thread'), true)) { ?>
<tr>
<td>更多鏈接</td>
<td>{<?php echo moreurl;?>}</td>
</tr>
<?php } ?>
<tr>
<td>當前數據順序</td>
<td>{<?php echo currentorder;?>}</td>
</tr>
<tr>
<td>當前數據是否在奇數行</td>
<td>{<?php echo parity;?>}</td>
 </tr>
 <tr>
<td>默認循環顯示內容</td>
<td>[loop]...[/loop]</td>
 </tr>
 <tr>
<td>替代對應loop中指定數據內容，[order=odd]為奇數行，[order=even]為偶數行</td>
<td>[order=N]...[/order]</td>
 </tr>
 <tr>
<td>特殊指定數據顯示內容</td>
<td>[index=N]...[/index]</td>
 </tr>
 <tr>
<td>可設置打開方式的鏈接</td>
<td>&lt;a href="{<?php echo url;?>}"{<?php echo target;?>}&gt;{<?php echo title;?>}&lt;/a&gt;</td>
 </tr>
 <tr>
<td>可設置縮略圖大小的圖片</td>
<td>&lt;img src="{<?php echo pic;?>}" width="{<?php echo picwidth;?>}" height="{<?php echo picheight;?>}" /&gt;</td>
 </tr>
 <tr>
<td>更多說明...</td>
<td>請參考： 後台 - 門戶 - 模塊模板 - 編輯/添加模板</td>
 </tr>
</table>
<?php } ?>
</div>
<div class="o pns">
<input type="hidden" name="eleid" value="<?php echo $_GET['eleid'];?>" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="stylesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>更新</strong></button>
<?php if($_G['inajax']) { ?><button type="button" class="pn" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;"><strong>取消</strong></button><?php } ?>
</div>
</form>
<?php } elseif($op == 'itemdata') { if($datalist) { ?>
<form id="blockformitemdata" name="blockformitemdata" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=itemdata&amp;bid=<?php echo $block['bid'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>">
<table class="dt mtm mbm">
<tr>
<th width="40">刪除</th>
<th>顯示位置</th>
<th>標題</th>
<th>通過審核時間</th>
<th>是否置頂</th>
<th width="80">操作</th>
</tr><?php if(is_array($datalist)) foreach($datalist as $item) { ?><tr>
<td><input type="checkbox" class="pc" name="ids[]" value="<?php echo $item['dataid'];?>" /></td>
<td><input type="hidden" name="olddisplayorder[<?php echo $item['dataid'];?>]" value="<?php echo $item['displayorder'];?>" />
<input type="input" class="px" name="displayorder[<?php echo $item['dataid'];?>]" value="<?php echo $item['displayorder'];?>" size="2" maxlength="4" /></td>
<td><a href="<?php echo $item['url'];?>" target="_blank"><?php echo $item['title'];?></a></td>
<td><?php echo $item['verifiedtime'];?></td>
<td><?php if($item['stickgrade']) { ?>置頂 <?php echo $item['stickgrade'];?><?php } else { ?>否<?php } ?></td>
<td>
<a href="portal.php?mod=portalcp&amp;ac=block&amp;op=managedata&amp;bid=<?php echo $block['bid'];?>&amp;dataid=<?php echo $item['dataid'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('showblock', this.getAttribute('href'));">編輯</a>
</td>
</tr>
<?php } ?>
<tr>
<td colspan="5">
<label for="chkall" onclick="checkall(this.form, 'ids')"><input type="checkbox" name="chkall" id="chkall" class="pc" />全選</label>
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="deletesubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>確定</strong></button>
</td>
</tr>
</table>
<?php if($multi) { ?><div class=""><?php echo $multi;?></div><?php } ?>
</form>
<?php } else { ?>
<p class="emp">此模塊的推送庫裡還沒有任何數據</p>
<?php } } elseif($op == 'setting') { if(is_array($settings)) foreach($settings as $key => $value) { ?><tr class="vt">
<th><?php echo $value['title'];?><?php if($value['comment']) { ?> <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" style="margin: 0;" onmouseover="showTip(this)" tip="<?php echo $value['comment'];?>" /><?php } ?></th>
<td><?php echo $value['html'];?></td>
</tr>
<?php } } elseif($op == 'item' || $op == 'additem') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">編輯模塊</em>
<span>
<?php if($_GET['itemfrom']=='ajax') { ?><a href="portal.php?mod=portalcp&amp;ac=block&amp;op=data&amp;bid=<?php echo $bid;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('showblock', this.href);closecalendar(e);return false;"> &lt;&lt;返回 </a><?php } if($_G['inajax']) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');<?php if(empty($bid)) { ?>drag.removeBlock('<?php echo $_GET['eleid'];?>');<?php } ?>return false;" title="關閉">關閉</a><?php } ?>
</span>
</h3>
<form id="blockform" name="blockform" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=<?php echo $op;?>&amp;bid=<?php echo $block['bid'];?>&amp;itemid=<?php echo $itemid;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onsubmit="if(check_itemdata_lentgh(this)) {ajaxpost('blockform','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');} else { return false;}" enctype="multipart/form-data">
<div class="c" style="height:<?php echo $height;?>; width: 490px; _padding-right: 17px; overflow-x: hidden; overflow-y: auto;">
<table class="tfm">
<tr>
<th>從數據源獲取</th>
<td>
<select id="push_idtype" class="ps vm">
<option value="tids" selected="selected">帖子id</option>
<option value="blogids">日誌id</option>
<option value="aids">文章id</option>
<option value="picids">圖片id</option>
</select>
<input type="text" name="push_id" id="push_id" class="px p_fre vm" value="" />
<button type="button" class="pn" onclick="block_pushitem('<?php echo $block['bid'];?>', '<?php echo $itemid;?>')"><span>獲取</span></button>
</td>
</tr>
<tr>
<th>顯示位置</th>
<td>
<select name="displayorder" class="ps vm"><?php if(is_array($orders)) foreach($orders as $value) { ?><option value="<?php echo $value;?>"<?php echo $orderarr[$value];?>><?php echo $value;?></option>
<?php } ?>
</select>
&nbsp;
<?php if($itemid && $item['idtype'] != 'rand') { ?>
<label for="lock_item"><input type="checkbox" name="locked" id="lock_item" class="pc" onclick="$('tbody_orderitem').style.display=this.checked ? '' : 'none';" value="1"<?php if($item['itemtype']=='1') { ?>checked="checked"<?php } ?> />固定</label>
<?php } else { ?>
<input type="hidden" name="locked" value="1" />
<label for="lock_item"><input type="checkbox" class="pc" name="locked_disable" id="lock_item" value="1" checked="checked" disabled="disabled" />固定</label>
<?php } ?>
</td>
</tr>
<tbody id="tbody_orderitem"<?php if($itemid && $item['itemtype']!='1') { ?> style="display:none;"<?php } ?>>
<tr>
<th>開始時間</th>
<td>
<input type="text" class="px p_fre" name="startdate"<?php if($item['startdate']) { ?> value="<?php echo $blockitem['startdate'];?>"<?php } ?> onclick="showcalendar(event, this, true)" />
<p class="d">留空表示立即開始</p>
</td>
</tr>
<tr>
<th>失效時間</th>
<td>
<input type="text" class="px p_fre" name="enddate"<?php if($item['enddate']) { ?> value="<?php echo $blockitem['enddate'];?>"<?php } ?> onclick="showcalendar(event, this, true)" />
<p class="d">留空表示不失效</p>
</td>
</tr>
</tbody>
<tbody id="tbody_pushcontent"><?php include template('portal/portalcp_block_itemfields'); ?></tbody>
</table>
</div>
<div class="o pns">
<input type="hidden" name="itemsubmit" value="true" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>提交</strong></button>
<?php if($_G['inajax']) { ?><button type="button" class="pn" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;"><strong>取消</strong></button><?php } ?>
</div>
</form>
<script type="text/javascript" reload="1">
if (typeof ctitlepb_frame == 'object' && !BROWSER.ie) {delete ctitlepb_frame;}
if (typeof csummarypb_frame == 'object' && !BROWSER.ie) {delete csummarypb_frame;}
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
<?php if($_GET['itemfrom']=='ajax') { ?>
showWindow('<?php echo $_GET['handlekey'];?>', 'portal.php?mod=portalcp&ac=block&op=data<?php if($_GET['from']) { ?>&from=<?php echo $_GET['from'];?><?php } ?>&bid='+values['bid'], 'get' ,0);
drag.blockForceUpdate('portal_block_'+values['bid']);
<?php } else { ?>
hideWindow('<?php echo $_GET['handlekey'];?>');
location.reload();
<?php } ?>
}
</script>

<?php } elseif($op == 'push') { include template('portal/portalcp_block_itemfields'); } elseif($op == 'recommend') { if($isrepeatrecommend) { ?>
<tr>
<th colspan="2"><div class="bm"><div class="ntc_l hm">此信息已被推送，再次推送將使用本次修改數據</div></div></th>
</tr>
<?php } if($perm['allowmanage'] || !$perm['needverify']) { ?>
<tr>
<th>更新模塊</th>
<td>
<label for="ck_updateblock"><input type="checkbox" name="updateblock" id="ck_updateblock" class="pc" value="1" checked="checked" />即時更新模塊數據</label>
</td>
</tr>
<tr>
<th>需要審核</th>
<td>
<label for="ck_needverify"><input type="checkbox" name="needverify" id="ck_needverify" class="pc" value="1"<?php if(isset($item['isverified']) && !$item['isverified']) { ?> checked="checked"<?php } ?> />勾選則加入審核庫；否則直接加入模塊推送庫</label>
</td>
</tr>
<?php } include template('portal/portalcp_block_itemfields'); if(!$perm['allowmanage'] && $perm['needverify']) { ?>
<tr><td colspan="2">您推送的信息將進入審核庫</td></tr>
<?php } } elseif($op == 'verifydata') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">審核數據</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;" title="關閉">關閉</a></span><?php } ?>
</h3>
<form id="dataform" name="dataform" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=verifydata&amp;bid=<?php echo $block['bid'];?>&amp;dataid=<?php echo $dataid;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onsubmit="ajaxpost('dataform','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');" enctype="multipart/form-data">
<div class="c" style="height:<?php echo $height;?>; width: 490px; _padding-right: 17px; overflow-x: hidden; overflow-y: auto;">
<table class="tfm">
<tbody id="tbody_pushcontent"><?php include template('portal/portalcp_block_itemfields'); ?></tbody>
<tr>
<th>更新模塊</th>
<td>
<label for="ckupdateblock"><input type="checkbox" name="updateblock" id="ckupdateblock" value="1" />立即更新該模塊數據</label>
</td>
</tr>
</table>
</div>
<div class="o pns">
<input type="hidden" name="verifydatasubmit" value="true" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>通過</strong></button>
</div>
</form>
<script type="text/javascript" reload="1">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
hideWindow('<?php echo $_GET['handlekey'];?>');
location.reload();
}
</script>
<?php } elseif($op == 'managedata') { ?>

<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">編輯數據</em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;" title="關閉">關閉</a></span><?php } ?>
</h3>
<form id="dataform" name="dataform" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=managedata&amp;bid=<?php echo $block['bid'];?>&amp;dataid=<?php echo $dataid;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onsubmit="ajaxpost('dataform','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');" enctype="multipart/form-data">
<div class="c" style="height:<?php echo $height;?>; width: 490px; _padding-right: 17px; overflow-x: hidden; overflow-y: auto;">
<table class="tfm">
<tr>
<th>置頂等級</th>
<td>
<select name="stickgrade" class="ps">
<option value="0"<?php if(empty($item['stickgrade'])) { ?> selected<?php } ?>>不置頂</option><?php if(is_array(range(1,10))) foreach(range(1,10) as $k) { ?><option value="<?php echo $k;?>"<?php if($item['stickgrade']=='$k') { ?> selected<?php } ?>>置頂<?php echo $k;?></option>
<?php } ?>
</select>
</td>
</tr>
<tbody id="tbody_pushcontent"><?php include template('portal/portalcp_block_itemfields'); ?></tbody>
</table>
</div>
<div class="o pns">
<input type="hidden" name="managedatasubmit" value="true" />
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>提交</strong></button>
</div>
</form>
<script type="text/javascript" reload="1">
function succeedhandle_<?php echo $_GET['handlekey'];?> (url, message, values) {
hideWindow('<?php echo $_GET['handlekey'];?>');
location.reload();
}
</script>
<?php } elseif($op == 'thumbsetting') { if($thestyle['makethumb']) { ?>
<tr>
<th width="80">縮略圖寬度</th>
<td><input type="text" name="picwidth" value="<?php echo $block['picwidth'];?>" class="px" /></td>
</tr>
<tr>
<th width="80">縮略圖高度</th>
<td><input type="text" name="picheight" value="<?php echo $block['picheight'];?>" class="px" /></td>
</tr>
<?php } if($thestyle['settarget']) { ?>
<tr>
<th width="80">鏈接打開方式</th>
<td>
<select name="a_target">
<option value="blank" <?php echo $targetarr['blank'];?>>新鏈接打開</option>
<option value="self" <?php echo $targetarr['self'];?>>本頁面打開</option>
<option value="top" <?php echo $targetarr['top'];?>>本頁面打開(跳出框架)</option>
</select>
</td>
</tr>
<?php } if(!$is_htmlblock) { ?>
<tr>
<th width="80">日期格式</th>
<td>
<select name="dateformat"><?php if(is_array($dateformats)) foreach($dateformats as $value) { ?><option value="<?php echo $value['format'];?>"<?php echo $value['selected'];?>><?php echo $value['time'];?></option>
<?php } ?>
</select>
&nbsp;
<label for="ckdateuformat"><input type="checkbox" name="dateuformat" id="ckdateuformat" class="pc" value="1"<?php if($block['dateuformat']) { ?> checked="checked"<?php } ?> />使用人性化日期格式</label>
<img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" style="margin: 0;" onmouseover="showTip(this)" tip="勾選此項，則最近的時間顯示「幾天前」的形式" />
</td>
</tr>
<?php } } elseif($op == 'getblock') { if(!$_G['inajax']) { ?>
<div class="wp"><div class="area"><div class="frame move-span frame-1 cl">
<?php } ?>
<?php echo $html;?>
<?php if(!$_G['inajax']) { ?>
</div></div></div>
<?php } } elseif($op == 'convert') { ?>
<script type="text/javascript" reload="1">
showWindow('showblock', 'portal.php?mod=portalcp&ac=block&op=block<?php if($_GET['from']) { ?>&from=<?php echo $_GET['from'];?><?php } ?>&bid='+<?php echo $bid;?>+'&tpl='+document.diyform.template.value, 'get', -1);
drag.blockForceUpdate('portal_block_<?php echo $bid;?>');
</script>
<?php } elseif($op == 'favorite') { ?>
<script type="text/javascript">
$('bfav_<?php echo $bid;?>').parentNode.onmouseover = '';
$('bfav_<?php echo $bid;?>').parentNode.onmouseout = '';
</script>
<?php if($favoriteop == 'add') { ?>
<img src="<?php echo IMGDIR;?>/fav.gif" alt="fav" title="取消收藏" class="favmark" />
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/fav_grey.gif" alt="normal" title="收藏" class="favmark" />
<?php } } elseif($op == 'moreurl') { if($_G['inajax']) { ?>
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">更多頁設置</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;" title="關閉">關閉</a></span>
</h3>
<ul class="tb cl">
<?php echo $blocknav;?>
</ul>
<?php } ?>
<form id="blockmoreurlform" name="blockformdata" method="post" autocomplete="off" action="portal.php?mod=portalcp&amp;ac=block&amp;op=moreurl&amp;classname=<?php echo $_GET['classname'];?>&amp;bid=<?php echo $block['bid'];?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>"<?php if($_G['inajax']) { ?> onsubmit="ajaxpost('blockmoreurlform','return_<?php echo $_GET['handlekey'];?>','return_<?php echo $_GET['handlekey'];?>','onerror');"<?php } ?>>
<div class="c"<?php if($_G['inajax']) { ?> style="width:490px; <?php if($_GET['from']=='cp') { ?>max-height:260px;<?php } else { ?>max-height:380px;<?php } ?>height:auto !important; height:320px; _padding-right: 17px; _margin-right: 0; overflow-x: hidden; overflow-y: auto;"<?php } ?>>

<table class="tfm">
<tr>
 <th>顯示條數 <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="設置更多頁每頁顯示數據的條數" /></th>
 <td>
 <input type="input" name="perpage" id="perpage" value="<?php echo $block['param']['moreurl']['perpage'];?>" />
 </td>
</tr>
<tr>
 <th>SEO Title <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="設置更多頁的頁面SEO Title" /></th>
 <td>
 <input type="input" class="pt" name="seotitle" id="seotitle" value="<?php echo $block['param']['moreurl']['seotitle'];?>" />
 </td>
</tr>
<tr>
 <th>SEO Keywords <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="設置更多頁的頁面SEO Keywords" /></th>
 <td>
 <textarea class="pt" name="seokeywords" id="seokeywords" ><?php echo $block['param']['moreurl']['seokeywords'];?></textarea>
 </td>
</tr>
<tr>
 <th>SEO Description <img src="<?php echo IMGDIR;?>/faq.gif" alt="Tip" class="vm" onmouseover="showTip(this)" tip="設置更多頁的頁面SEO Description" /></th>
 <td>
 <textarea class="pt" name="seodescription" rows="4" id="seodescription"><?php echo $block['param']['moreurl']['seodescription'];?></textarea>
 </td>
</tr>
</table>
</div>
<div class="o pns">
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" />
<input type="hidden" name="moreurlsubmit" value="true" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<button type="submit" class="pn pnc"><strong>更新</strong></button>
<?php if($_G['inajax']) { ?><button type="button" class="pn" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');return false;"><strong>取消</strong></button><?php } ?>
</div>
</form>
<?php } if(!$_G['inajax'] && in_array($op, array('block', 'data', 'itemdata'))) { ?>
</div>
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda"><?php if($_G['setting']['portalstatus'] ) { ?>門戶管理<?php } else { ?>模塊管理<?php } ?></h2>
<ul>
<?php if($_G['setting']['portalstatus'] ) { if($admincp2 || $_G['group']['allowmanagearticle']) { ?><li<?php if($ac == 'index') { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=index">頻道欄目</a></li><?php } if($admincp2 || $admincp3 || $_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle']) { ?><li<?php if($ac == 'category') { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=category">文章管理</a></li><?php } } if($admincp4 || $admincp6 || $_G['group']['allowdiy']) { ?>
<li<?php if($ac == 'portalblock' || $ac=='block') { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=portalblock">模塊管理</a></li>
<?php } if(!$_G['inajax'] && !empty($_G['setting']['plugins']['portalcp'])) { if(is_array($_G['setting']['plugins']['portalcp'])) foreach($_G['setting']['plugins']['portalcp'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="portal.php?mod=portalcp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } if(!empty($modsession->islogin)) { ?>
<li><a href="portal.php?mod=portalcp&amp;ac=logout">退出</a></li>
<?php } ?>
</ul>
</div></div>
</div>
<?php } include template('common/footer'); ?>