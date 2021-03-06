<?php 
	include 'student.php';
	header("Content-type: text/html; charset=utf-8"); 
	$stu = new student();
	session_start();
	if(!isset($_SESSION['stu']))
		header('Location:index.php');
	$stu = unserialize($_SESSION['stu']);
	$stu_tags = unserialize($_SESSION['stu_tags']);
	$share_url_weibo = unserialize($_SESSION['share_url_weibo']);
	$share_url_renren = unserialize($_SESSION['share_url_renren']);
	$share_url_qzone = unserialize($_SESSION['share_url_qzone']);
 ?>
 <?php include'header.php' ?>
 <div class="container">
	 <div class="line">
		<div class="ui raised segment user-info">
			<div class=" headphoto"><i class="user icon"></i></div>
			<a href=""><?=$stu->name?></a>
			<span>学号：<?=$stu->id?></span>
			<p>学院：<?=$stu->college?></p>
			<p>专业：<?=$stu->major?></p>
		</div>
		 <div class="ui raised segment gpa">
		 	<div class="ui ribbon  red label ">河海大学</div>
		 	<div class="clear"></div>
		 	<div class="credit">你的绩点是<p><?=$stu->credit?></p></div>
		 	<div class="more">
			 	<div class="tags">
			 		<?php 
			 			foreach ($stu_tags as $k => $v) {
			 				echo '<a class="ui '.$v['color'].' label">'.$v['word'].'</a>';
			 			}
			 		// var_dump($stu_tags);
			 		 ?>
			 	</div>
			 	<div class="share bdsharebuttonbox">
			 		
			 		<span>炫耀一下？分享到</span>
			 		<a href="<?=$share_url_renren?>"  target="_blank" class="share-renren share-button" title="分享到人人"></a>
			 		<a href="<?=$share_url_weibo?>"  target="_blank" class="share-weibo share-button" title="分享到新浪微博"></a>
			 		<a href="<?=$share_url_qzone?>" class="share-qzone share-button"  target="_blank" title="分享到QQ空间"></a>
					<a href="#" class="bds_weixin share-weichat share-button" data-cmd="weixin" title="分享到微信"></a>
			 	</div>
		 	</div>
		 </div>
	 </div>
	 <div class="line">
		<div class="border-r peakedness peakedness-box">
		    <div class="peakedness-tips-box">
		        <div class="peakedness-tips" style="width: 278px;">
		            绩点：<span class="col-red"><?=$stu->credit?></span>
		        </div>
		    </div>
		    <div class="peakedness-line">
			    <div class="peakedness-one peakedness-two" style="height: 25px;">
			    	<i style="left:<?=$stu->credit/5*950-13?>px"></i></i>
			    	<span class="col-red credit-tag" style="left:<?=$stu->credit/5*950-70?>px">你在这里↓</span>
			        <div class="peaked-st">
			                <span class="st">0</span>
			                <span class=" st-1">2.0</span>
			                <span class=" st-1">2.5</span>
			                <span class=" st-1">3.0</span>
			                <span class=" st-1">3.5</span>
			                <span class=" st-1">4.0</span>
			                <span class="">4.5</span>
			                <span class=" st-2">5.0</span>
			        </div>
		        </div>
		    </div>
		    <div class="clear"></div>
		</div>
	 </div>
	 <div class="ui horizontal divider table-divider">
  		具体成绩(点击表格表头可以进行排序)
     </div>
	 <table class="ui table segment table-sheet sortable">
	 	<thead>
	  		<tr>
	  			<th class="subject-title">课程名称</th>
	  			<th class="subject-type">课程性质</th>
	  			<th class="subject-test">考核方式</th>
	  			<th class="subject-credit">学分</th>
	 		 	<th class="subject-score">成绩</th>
	 		 	<th class="subject-gpa">绩点</th>
	 		 	<th class="subject-rank">排名(前百分比)</th>
	  		</tr>
	  	</thead>
		<?php 
			foreach ($stu->report as $k => $v) {
			 	echo '<tr>';
			 	echo '<td class="subject-title">'.$v->title.'</td>';
			 	echo '<td class="subject-type">'.$v->type.'</td>';
			 	echo '<td class="subject-test">'.$v->test.'</td>';
			 	echo '<td class="subject-credit">'.$v->credit.'</td>';
			 	
			 	if($v->score>=90||$v->score=="优秀")
			 		echo '<td class="subject-score table-green"><strong>'.$v->score.'</strong></td>';
			 	elseif($v->score<60||$v->score=="合格") 
			 		echo '<td class="subject-score table-red"><strong>'.$v->score.'</strong></td>';
			 	else
			 		echo '<td class="subject-score">'.$v->score.'</td>';

			 	if($v->gpa!=null)
			 		echo '<td class="subject-gpa">'.$v->gpa.'</td>';
			 	else
			 		echo '<td class="subject-gpa">/</td>';
			 	if($v->rank!=null)
			 		echo '<td class="subject-rank"><p>'.sprintf("%.2f",$v->rank/$v->totnum*100).'%('.$v->rank.'/'.$v->totnum.')</p><div class="rank_i">
			 			<i style="width:'.(100-$v->rank/$v->totnum*100).'%"></i></div></td>';
			 	else 
			 		echo '<td class="subject-rank">无</td>';
			 	echo '</tr>';
			 }
		?>
	</table>
</div>
 <?php include'footer.php' ?>