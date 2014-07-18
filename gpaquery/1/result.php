<?php 
	include 'student.php';
	
	header("Content-type: text/html; charset=utf-8"); 
	$stu = new student();
	session_start();
	$stu = unserialize($_SESSION['stu']);
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
		 	<div class="ui ribbon  red label ">计算机</div>
		 	<div class="clear"></div>
		 	<div class="credit">你的绩点是<p><?=$stu->credit?></p></div>
		 	<div class="share">
		 		炫耀一下？
		 		<span>分享到</span>
		 		<a href=""><i class="icon renren"></i></a>
		 		<a href=""><i class="icon weibo"></i></a>
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
		    <div class="peakedness-one peakedness-two" style="height: 25px;">
		    	<i style="left:<?=$stu->credit/5*950?>px"></i></i>
		    	<span class="col-red credit-tag" style="left:<?=$stu->credit/5*950-50?>px">你在这里↓</span>
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
		    <div class="clear"></div>
		</div>
	 </div>
	 <div class="ui horizontal divider table-divider">
  		具体成绩(点击表格表头可以进行排序)
     </div>
	 <table class="ui table segment table-sheet sortable">
	 	<thead>
	  		<tr>
	  			<th>课程名称</th>
	  			<th>课程性质</th>
	  			<th>考核方式</th>
	  			<th>学分</th>
	 		 	<th>成绩</th>
	 		 	<th>绩点</th>
	 		 	<th>排名(前百分比)</th>
	  		</tr>
	  	</thead>
		<?php 
			foreach ($stu->report as $k => $v) {
			 	echo '<tr>';
			 	echo '<td>'.$v->title.'</td>';
			 	echo '<td>'.$v->type.'</td>';
			 	echo '<td>'.$v->test.'</td>';
			 	echo '<td>'.$v->credit.'</td>';
			 	
			 	if($v->score>=90||$v->score=="优秀")
			 		echo '<td class="green">'.$v->score.'</td>';
			 	elseif($v->score<60||$v->score=="合格") 
			 		echo '<td class="red">'.$v->score.'</td>';
			 	else
			 		echo '<td>'.$v->score.'</td>';

			 	if($v->gpa!=null)
			 		echo '<td>'.$v->gpa.'</td>';
			 	else
			 		echo '<td>/</td>';
			 	if($v->rank!=null)
			 		echo '<td><p>'.sprintf("%.2f",$v->rank/$v->totnum*100).'%('.$v->rank.'/'.$v->totnum.')</p><div class="rank_i">
			 			<i style="width:'.(100-$v->rank/$v->totnum*100).'%"></i></div></td>';
			 	else 
			 		echo '<td></td>';
			 	echo '</tr>';
			 }
		?>
	</table>
</div>
 <?php include'footer.php' ?>