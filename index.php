<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>The Community Cloud</title>
	<script type="text/javascript" src="library/jquery.min.js" ></script>
    <script type="text/javascript" src="library/sha512.js" ></script>

</head>

<body>

<style>
	body{
		font-family:verdana;
		margin:0 0 0 0;
		
		}
	::-webkit-scrollbar{
	width:0px;
	}
::-webkit-scrollbar-thumb{
	background-color:rgba(56,56,56,0.7);
}
::-webkit-scrollbar-track{
	background-color:rgba(56,56,56,0.5);
	}
	h1,p,h5,h6{
		margin:0 0 0 0;
		
	}
	p{
		font-size:3vw;
		}
	div{
		transition:ease-in;
		}
	ul{
		margin:0 0 0 0;
		padding:0 0 0 0;
		}
	li{
		list-style:none;
		}
	.nav_bar_outer div{
		width:100%;
		
		}
	.nav_bar_inner{
		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMC4xNyIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, rgba(0,0,0,0.17) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(0,0,0,0.17)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%,rgba(0,0,0,0.17) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#2b000000',GradientType=0 );
box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
-moz-box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
-webkit-box-shadow:1px 1px 13px 3px rgba(20, 20, 20, 0.47);
margin-bottom:1%;
		}
	.nav_top{
		
		}
	.nav_top .tit{
	 
	 position:relative;
		}
	.nav_top .tit h1{
	 width: 98%;
   	 height: 70%;
    margin: auto;
    font-size: 5vw;	  
	  position: absolute;
	  color: rgba(61, 30, 5, 0.81);
	  top: 25%;
	  left:2%;
		}
	.main_options{
		width:1.6%;
		position:absolute;
		right:6%;
		top:8%;
		cursor:pointer
		}
.main_container,.global_container_outer,global_container_inner,section{
		width:100%;
		}
	section{
		position:relative;
		}
	.splash,.splash1{
		position:absolute;
		width:100%;
		height:100%;
		top:0;
		left:0;
	    background-color: rgba(0, 0, 0, 0.38);
        z-index: 1;
		}
	section .shelf{
		width:100%;
		margin-top:-5px;
		}
	section .shelf img,section .shelf span{
		width:100%;
		}
	.shelf_content_first_rack{
		position:absolute;
		z-index:1;
		width:100%;
		top:30%;
		}
	.shelf_title_outer p{
		padding-left:2%;
		 width: 98%;
		height: 100%;
		font-size: 5Vw;
		color:#4E2303;
		position:absolute;
		
				}
	.shelf_content{
	  position: absolute;
	  z-index: 1;
	  top: 8%;
	  height: 88%;
	  left: 3%;
	  width: 97%;
		
		}	
	
	.shelf_options{
		position:absolute;
		width:5%;
		right:10%;
		cursor:pointer;
		}
	.shelf_options img{
		width:100%;
		
		}
	.shelf_main_outer{
		position:relative;
		bottom:0;
		height:100%;
		}
	.file_list{
	  height: 100%;
	  padding: 0 0 0 0;
	  margin-left:0;
	  left: 3%;
	  position: relative;
	  width: 93%;
	  max-height:100%;
	  overflow:auto;
		}
	.file_info_class{
		  bottom: -10%;
  		  position: relative;
		  width: 15%;
		  min-height: 67%;
		  max-height: 67%;
		  overflow: hidden;
		  background-color: #0CF;
		  float: left;
		  margin: 2%;
		  cursor:pointer;
		}
	.file_info_class h1{
	width: 100%;
   		 height: 100%;
    	font-size: 3vw;
	  width: 100%;
	  min-height: 21px;
	  max-height: 38px;
	  overflow-y: hidden;
	  padding: 5%;
		}
	.file_info_class p{
	 overflow: hidden;
	  padding: 4%;
	  min-height: 24px;
	  max-height: 60px;
	 width: 100%;
   		 height: 100%;
    	font-size: 2vw;
		}
	.file_options{
		color: #1F1F1F;
	  position: absolute;
	  z-index: 99;
	  background-color: rgb(243, 244, 242);
	  font-size: 3vw;
	  border: 1px solid #696565;
	  border-radius: 4px;
		}
		
	.file_options li{
		padding:10px 10px;
		cursor:pointer;
		}
	.file_options li:hover{
	    background-color: #BEBCBC;
	}
	.file_exp_outer{
		position:absolute;
		left:10%;
		top:20%;
		width:80%;
		z-index:999;
		}
	.file_exp_inner{
		width:100%;
		background-color:#fff;
		border:1px solid #999;
		}
	.file_exp_inner h5,.file_exp_inner h6{
		font-weight:normal;
		float:left;
		}
	.file_exp_main{
		padding:5%;
		}
	.file_exp_inner h5{
		color:#999;
		width: 100%;
   		 height: 100%;
    	font-size: 4vw;
		}-
	.file_exp_main p{
    	font-size: 4vw;
		color:#36F;
		}
	.file_exp_inner h6{
		color:#555;
		font-size:3vw;
		}
	.ext_text p{
		width:95%;
		padding-left:5%;
    	font-size: 7vw;
		background-color: #F0EFEF;
 		box-shadow: 0px 2px 20px 0px #763908;
		}
	.ext_text1 p{
		width:95%;
		padding-left:5%;
		font-size:5vw;
		background-color: #F0EFEF;
 		box-shadow: 0px 2px 20px 0px #763908;
		}
	.download,.upload_button{
		padding: 2% 20%;
        margin: 4% 20%;
  		font-size: 3vw;
		}
	.share_select,.text_desc{
		padding:2% 5%;
		
    	font-size: 3vw;
		}
	.people_select{
		 
		  padding: 2% 0%;
		  width: 70%;
		  height: 100%;
		  font-size: 3vw;
		  margin-top: 2%;
		}
	#add_p_t{
		 padding: 1% 9%;
  		margin: 1%;
		font-size:3vw;
		}
	.add_div_inner{
		margin:2% 1%;
		}
	.add_div{
		background-color: #7BF4FD;
 		 border: 1px solid #39C3DB;
		display:inline-block;
		margin:1%;
		width:18%;
		height:5%;
		
		}
	.add_div p{
		 float: left;
		  padding: 1% 2%;
		  font-size: 2vw;
		}
	.add_div img{
		cursor:pointer;
		width:10%;
		float:right;
		}
	.upload_main{
		padding:2% 2%;
		
    	font-size: 3vw;
		}
	.share_select_done{
		padding: 2% 8%;
       
  		
    	font-size: 3vw;
		
		}
	.add_rack_mem{
		width:90%;
		height:30%;
		padding:2% 0%;
		width: 100%;
   		 height: 100%;
    	font-size: 3vw;
		margin-top:2%;
		}
	.search_team_o text{
		width:70%;
		background-color:transparent;
		color:brown;
		border:0px;
		border-bottom:1px solid brown;
		}
	.thru_pc{
		border-top:1px solid #999;
		}
	.please{
		position:absolute;
		z-index:99;
		top:40%;
		left:30%;
		}
</style>
<script>
	function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
} 
	$(function(){
		//var check=/AppName\/[0-9\.]+$/.test(navigator.userAgent);
		//if(check){
		var rand_no=getUrlParameter('num');
		
		if(rand_no){
			$(document).ajaxStart(function() {
				$("<div class='splash1'></div><p class='please'>please wait..</p>").appendTo("body");
			});
			$(document).ajaxStop(function() {

				$(document).find(".splash1").remove();
				$(document).find(".please").remove();
			});
			
				
			$(window).on("load",function(){
				$.ajax({
					url:'infogiver.php',
					method:'post',
					dataType:'text',
					data:{
						flag:'init',
						rand_no:rand_no
						},
					success:function(data){ 
					
					if(data == false){
						window.location.replace("error.html");
						}
						if(data){ 
						
							var info=JSON.parse(data);
							if(info[0].files){
								$.ajax({
									url:'infogiver.php',
									method:'post',
									dataType:'text',
									data:{
										flag:'files_list',
										files:info[0].files
										},
									success:function(data){
										
										if(data){
											var info; 
											if(info=JSON.parse(data)){
												var append="<ul class='file_list'>";
												$.each(info,function(index,val){
													
														
																  append +="<li class='file_info_class' id='"+info[index].file_id+"'><h1>."+info[index].ext+"</h1><p>"+info[index].desc+"</p></li>";
														
														
													
													});
													append+="</ul>";
													$(append).appendTo($('body').find("#your_docs").find(".shelf_main_outer"));
												}
											
											}
										else { alert(data);
											window.location.replace("error.html");
											}
										},
									error:function(jXHR,errorThrown,textStatus){
										alert(textStatus);
										}								
									});
								}
							}
						},
					error:function(jXHR,errorThrown,textStatus){
						alert(textStatus);
						}
					});		
					
							$.ajax({
									url:'infogiver.php',
									method:'post',
									dataType:'text',
									data:{
										flag:'share_list_info'
										},
									success:function(data){
										if(data){
											var info=JSON.parse(data);	
											if(info){
											var append="<ul class='file_list'>";	
											$.each(info,function(index1,val){
												 append +="<li class='file_info_class' id='"+info[index1]['file_id']+"'><h1>."+info[index1]['ext']+"</h1><p>"+info[index1]['desc']+"</p></li>";
												});
											append+="</ul>";
											$(append).appendTo($(document).find("#shared_docs .shelf_main_outer"));
										}}
									},
												error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
							});
							$.ajax({
									url:'infogiver.php',
									method:'post',
									dataType:'text',
									data:{
										flag:'team_list_info'
										},
									success:function(data){
										if(data){
											var info=JSON.parse(data);	
											var append='',append1='',classname;
											$.each(info['team'],function(index,val){
												var y=info['team'][index]['team_id']; 
												var u=info['team'][index]['team_desc'];
											if(y){
											append+="<section id='t_sh_"+y+"'><div class='shelf'><img src='img/shelf_bottom.png' /></div><div class='shelf_content'><div class='shelf_title_outer'><p>"+u+"</p></div><div class='shelf_options'> <img src='img/options.png' /></div><div class='shelf_main_outer'><ul class='file_list'>";					var o=info['team'][index]['files'];
											$.each(o,function(index1,val){console.log(o[index1]);
												 append +="<li class='file_info_class' id='"+o[index1]['file_id']+"'><h1>."+o[index1]['ext']+"</h1><p>"+o[index1]['desc']+"</p></li>";
												});
											append+="</ul></div></div></section>";
											}
											});
											
											$(append).appendTo(".main_container");
											
											
											
											
											}
											
										},
												error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
						
									});
				
			
			$(document).find(".main_options").on("click",function(e){
				var append="<span class='file_options'><ul class='file_options_list'>";
					append+="<li class='refresh'><p>refresh</p></li>";
					append+="<li class='upload'><p>upload</p></li>";
					append+="<li class='add_rack'><p>add team</p></li>";
					append+="<li class='thru_pc'><p>thru pc</p></li>";
					append+="</ul></span>";
				$(".file_options").remove();
				if($(".file_options").length ==0)
				var l=e.pageX-100;
				$(append).appendTo('.main_container').css('top',e.pageY).css('left',l);
				$.ajax({
					url:'infogiver.php',
					dataType:'text',
					method:'post',
					data:{
						flag:'whoishe'
						},
					success:function(data){
						var info;
						if(info=JSON.parse(data)){
							if(info['status']=='heisgood'){
								var append1="<li class='search_team'><span style='display:none'>Search for team in "+info['placeholder']+"</span><p>Search for team</p></li>";
								$(append1).appendTo($(document).find('.file_options_list'));
								}
							}
						},
					error:function(jXHR,errorThrown,textstatus){
						alert(errorThrown);
						}
					
					});
				});
			$(document).on("click",".search_team",function(){
				$(".file_options").remove();
				var t=$(document).find(".search_team span").html();
				var append="<div id='add_rack_o' class='file_exp_outer'><div class='file_exp_inner'>";
					append+="<div class='file_exp_top_outer'>";
					append+="<div class='file_exp_inner'>";
					append+="<span class='ext_text1'><p>"+t+"</p></span>";
					append+="<div class='file_exp_main'><h6>Access the team records in your department..</h6>";
					append+="<input type='text' class='add_rack_mem name_team' name='name_team' placeholder='Name of the team' ><br/>";
					append+="<input type='submit' name='team_s_sub' id='team_s_sub' class='download' value='done'></div></div></div>";
					 $("<div class='splash'></div>").appendTo("body");
					 $(append).appendTo("body");
				});
			$(document).on("click","#team_s_sub",function(){
				var team_name=$("input[name='name_team']").val();
				if(team_name != ""){
					$.ajax({
					url:'infogiver.php',
					dataType:'text',
					method:'post',
					data:{
						flag:'search_team_name',
						team_name:team_name
						},
					success:function(data){
						var info;
						if(info=JSON.parse(data)){
							if(info['team']['team_id'] !=""){
								var append='',append1='',classname;
											$.each(info['team'],function(index,val){
												var y=info['team'][index]['team_id']; 
												var u=info['team'][index]['team_desc'];
											if(y){
											append+="<section id='t_sh_"+y+"'><div class='shelf'><img src='img/shelf_bottom.png' /></div><div class='shelf_content'><div class='shelf_title_outer'><p>"+u+"</p></div><div class='shelf_options'> <img src='img/options.png' /></div><div class='shelf_main_outer'><ul class='file_list'>";					var o=info['team'][index]['files'];
											$.each(o,function(index1,val){
												 append +="<li class='file_info_class' id='"+o[index1]['file_id']+"'><h1>."+o[index1]['ext']+"</h1><p>"+o[index1]['desc']+"</p></li>";
												});
											append+="</ul></div></div></section>";
											}
											});
											
											$(append).appendTo(".main_container");
											$("#add_rack_o,.splash").remove();
											
								}
							}
						},
					error:function(jXHR,errorThrown,textstatus){
						alert(errorThrown);
						}
					
					});
					
				}
				});
			$(document).on("click",".refresh",function(){
				location.reload();
				});
			$(document).on("click",".thru_pc",function(){
				check_qr();
				});
			$(document).on("click",".add_rack",function(){
				var append="<div id='add_rack_o' class='file_exp_outer'><div class='file_exp_inner'>";
					append+="<div class='file_exp_top_outer'>";
					append+="<div class='file_exp_inner'>";
					append+="<span class='ext_text1'><p>add rack</p></span>";
					append+="<div class='file_exp_main'><h6>you can add a rack and share with your team.</h6>";
					append+="<input type='text' class='add_rack_mem' name='add_rack_mem' placeholder='description' ><br/><p>Add people to the team..</p>";
									$.ajax({
											url:'infogiver.php',
											dataType:'text',
											method:'post',
											data:{
												flag:'people_list',
												rand_no:rand_no
												},
											success:function(data){
												if(data){
													var info=JSON.parse(data);
													append+="<div class='add_main_div'><select class='people_select' name='people_select'><option value=''></option>";
													
													$.each(info,function(index,val){
														append+="<option value='p_s_"+info[index]['mem_id']+"'>"+info[index]['name']+"</option>";
														});
												}
											 append+="</select><button id='add_p_t'>add</button><div class='add_div_inner'></div></div>";
												append+="<input type='submit' name='people_submit' id='people_submit' class='download' value='done'></div></div></div>";
								 $("<div class='splash'></div>").appendTo("body");
											 $(append).appendTo("body");	
											},
												error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
						
									});
								
				
	
					
				});
			$(document).on("click",'#add_p_t',function(){
				var add_id=$(".people_select").val();
				var add_id_temp=add_id.replace("p_s_","");
				if(add_id_temp){
					var name_s=$(".people_select option[value='"+add_id+"']").text();
					var append="<div class='add_div' id='div_id_"+add_id+"'>";
						append+="<p>"+name_s+"</p>";
						append+="<img src='img/close.gif'></div>";
					$(append).appendTo($(document).find(".add_div_inner"));
					
						
					
					}
				});
			$(document).on("click",".add_div img",function(){
				$(this).parent().remove();
				});
			$(document).on("click","#people_submit",function(){
				var add_mems=add_id=[];
				add_mems=$(document).find('.add_div_inner').children();
				$.each(add_mems,function(index,val){
					add_id.push(add_mems[index]['id'].replace("div_id_p_s_",""));
					});
									$.ajax({
											url:'infogiver.php',
											dataType:'text',
											method:'post',
											data:{
												flag:'people_submit',
												desc:$(".add_rack_mem").val(),
												add_id:add_id
												},
											success:function(data){
												if(data.indexOf("updated")>-1){
													var t=data.replace("updated_","");
													var append="<section id='t_sh_"+t+"'><div class='shelf'><img src='img/shelf_bottom.png' /></div><div class='shelf_content'><div class='shelf_title_outer'><p>"+$(".add_rack_mem").val()+"</p></div><div class='shelf_options'> <img src='img/options.png' /></div><div class='shelf_main_outer'></div></div></section>";
												$(append).appendTo(".main_container");
												$(document).find(".splash").click();
												}
											},
											error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
										});
				});
			$(document).on("click",".upload",function(){
				var append="<div id='upload_file' class='file_exp_outer'><div class='file_exp_inner'>";
					append+="<div class='file_exp_top_outer'>";
					append+="<div class='file_exp_inner'>";
					append+="<span class='ext_text1'><p>Upload a document</p></span>";
								append+="<div class='file_exp_main'><h6>Document description &nbsp</h6>";
								append+="<form action='' class='upload_file' name='upload' enctype='multipart/form-data' method='post' ><input type='text' class='text_desc' name='text_desc' placeholder='description' ><br/>";
								append+="<input type='file' name='file'  class='upload_main'>";
								append+="<br/><br/><div class='file_exp_share'><h6>Share with &nbsp </h6>";
											$.ajax({
											url:'infogiver.php',
											dataType:'text',
											method:'post',
											data:{
												flag:'share_list',
												rand_no:rand_no
												},
											success:function(data){
												if(data){
													var info=JSON.parse(data);
													append+="<select class='share_select' name='share_select'><option value=''></option>";
													$.each(info['team'],function(index,val){
														append+="<option style='color:red' value='t_s_"+info['team'][index]['team_id']+"'>"+info['team'][index]['team_desc']+"</option>";
														});
													$.each(info['mem'],function(index,val){
														append+="<option value='m_s_"+info['mem'][index]['mem_id']+"'>"+info['mem'][index]['name']+"</option>";
														});
												}
											 append+="</select>";
											 append+="<input type='submit' name='upload_submit' class='upload_button' value='upload'></form></div></div>";
								 $("<div class='splash'></div>").appendTo("body");
											 $(append).appendTo("body");	
											},
												error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
						
									});
								
											
								
				});
			$(".shelf img").on("click",function(){
				$(".file_options").remove();
				});
			
			$(document).on("click","section .shelf_main_outer .file_info_class",function(){
				var file_id=$(this).attr("id");
				var append="<div id='f_"+file_id+"' class='file_exp_outer'><div class='file_exp_inner'>";
					append+="<div class='file_exp_top_outer'>";
					append+="<div class='file_exp_inner'>";
				var file_id=$(this).attr("id");
					$.ajax({
						url:'infogiver.php',
						dataType:'text',
						method:'post',
						data:{
							flag:'file_info',
							file_id:file_id
							},
						success:function(data){
							if(data){
								var info=JSON.parse(data);
								append+="<span class='ext_text'><p>."+info[0].ext+"</p></span>";
								append+="<div class='file_exp_main'><h6>Document description &nbsp</h6>";
								append+="<p>"+info[0].desc+"</p><br/>";
								append+="<h6>Shared with  &nbsp</h6>";
								append+="<h5>teams:  &nbsp<h5/>";
								$.ajax({
									url:'infogiver.php',
									dataType:'text',
									method:'post',
									data:{
										flag:'team_permit_list',
										file_id:file_id
										},
									success:function(data){
										if(data){
											
											var info=JSON.parse(data);
											append+="<div class='file_list_permit_list'><div class='file_exp_team_list'>";
											if(info['team']){
												$.each(info['team'],function(index,val){
													append+="<p id='t_"+info['team'][index]['team_id']+"'>"+info['team'][index]['team_desc']+"</p>";
												});
												append+='</div><br/>';
												}
											if(info['mem']){
												append+="<h5>members:  &nbsp<h5/><div class='file_exp_mem_list'>";
												$.each(info['mem'],function(index,val){
													append+="<p id='m_"+info['mem'][index]['mem_id']+"'>"+info['mem'][index]['name']+"</p>";
												});
												append+='</div></div>';
												
												}
											
											
										}   
											append+="<br/><br/><div class='file_exp_share'><h6>Share with &nbsp </h6>";
											$.ajax({
											url:'infogiver.php',
											dataType:'text',
											method:'post',
											data:{
												flag:'share_list',
												rand_no:rand_no
												},
											success:function(data){
												if(data){
													var info=JSON.parse(data);
													append+="<select class='share_select'>";
													$.each(info['team'],function(index,val){
														append+="<option style='color:red' id='t_s_"+info['team'][index]['team_id']+"'>"+info['team'][index]['team_desc']+"</option>";
														});
													$.each(info['mem'],function(index,val){
														append+="<option id='m_s_"+info['mem'][index]['mem_id']+"'>"+info['mem'][index]['name']+"</option>";
														});
												}
											 append+="</select><button class='share_select_done'>Done</button><form action='down_file.php' method='post' name='down_file'><input type='hidden' name='down_file_id' value='"+file_id+"'><input type='submit' name='down_submit' id='download' class='download' value='download'/></form></div></div>";
											 $("<div class='splash'></div>").appendTo("body");
											 $(append).appendTo("body");
											},
											error:function(jXHR,errorThrown,textstatus){
												alert(errorThrown);
											}
											});
									},
										
									error:function(jXHR,errorThrown,textstatus){
										alert(errorThrown);
									}
						
									});
									
								}
								
							},
						error:function(jXHR,errorThrown,textstatus){
							alert(errorThrown);
							}
						});
				
				});
			
			function add_sharing(file_id,mem_id,div){
				$.ajax({
						url:'infogiver.php',
						dataType:'text',
						method:'post',
						data:{
							flag:'add_sharing',
							file_id:file_id,
							mem_id:mem_id,
							div:div
							},
						success:function(data){
							if(data=='updated'){
								
								}
								
							},
						error:function(jXHR,errorThrown,textstatus){
							alert(errorThrown);
							}
						});
							
				}
			
			$(document).on("click",".share_select_done",function(){
				var file_id_temp,file_id,mem_id,div;
				var mem_id_temp=$(document).find(".share_select").find('option:selected').attr('id');
				file_id_temp=$(document).find(".file_exp_outer").attr("id");
				file_id=file_id_temp.replace("f_","");
				if(mem_id_temp.indexOf("t_s_")>=0){
					
					div='.file_exp_team_list';
					}
				if(mem_id_temp.indexOf("m_s_")>=0){
					
					div='.file_exp_mem_list';
					}
				
				add_sharing(file_id,mem_id_temp,div);
				});
			
			$(document).on("click",".splash",function(){
				$(".splash").remove();
				$(".file_exp_outer").remove();
				});
			});
		
	}
	else{
		window.location.replace("error.html");
		}
		
		
	});
	
</script>

<?PHP 

ini_set('memory_limit','128M');
include('../hree/cred.php');
if(isset($_GET['num'])){
	$random_no=$_GET['num'];
			function sec_session_start() {
						$session_name = 'sec_session_id';
						$secure = false;
						$httponly = true; 
						ini_set('session.use_only_cookies', 1);
						$cookieParams = session_get_cookie_params(); 
						session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
						session_name($session_name); 
						if(!isset($_SESSION)){
							session_start();
							}
						session_regenerate_id(); 	 
						}
		sec_session_start();
		$now = time();
		if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
			
			session_unset();
			session_destroy();
			session_start();
		}
		
		
		$_SESSION['discard_after'] = $now + 3600;
		
			$mobile_no=null;
			
			$stm=$mysqli->prepare("select `mobile_no` from `drive`.`auth` where `random_no`='".$random_no."' LIMIT 1 ");
			//$stm1=$mysqli->prepare("delete  from `drive`.`auth` where `random_no`='".$random_no."' LIMIT 1 ");
			$stm->execute();
			$stm->bind_result($mobile_no);
			$stm->store_result();
			if($stm->fetch()){
			//$stm1->execute();
			$stm->close();
			if($mobile_no==null){
				header("location:error.html");
				}
			$_SESSION['mobile_no']=$mobile_no;
			
		
			}
	if(isset($_POST['upload_submit']) && $_SESSION['mobile_no']){
		include ('s3_config.php');
			$mobile_no=$_SESSION['mobile_no'];
			if(file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {
   				

			$temp = explode(".", $_FILES["file"]["name"] );
			$extension = end($temp);
			
			$stm=$mysqli->prepare("select * from `drive`.`members` where `number`='".$mobile_no."' ");
			$stm->execute();
			$stm->bind_result($mem_id,$name,$designation,$teams,$files,$shared_files,$number,$tkt,$active_status);
			$stm->store_result();
			$stm->fetch();
			
			//file encryption
			$target="data/mem_folder_".$mem_id."/temp.cc";
			move_uploaded_file($_FILES['file']['tmp_name'],$target);
			
			$time = microtime(true);
			$random_salt_temp = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
			$time1 = microtime(true)- $time;
			echo $time1* 1000000000; echo "<br/>";
			$random_salt=hash('sha512',$mobile_no.$random_salt_temp);
			$time = microtime(true)- $time;
			echo $time* 1000000000;
			require_once('aes256/AESCryptFileLib.php');
			
			require_once ('aes256/MCryptAES256Implementation.php');
			
			$mcrypt = new MCryptAES256Implementation();
			
			$lib = new AESCryptFileLib($mcrypt);
			
			$file_to_encrypt = $_FILES["file"]["name"];
			$encrypted_file = time()."_".$_FILES["file"]["name"].".hree"; 
			
			$target1="data/mem_folder_".$mem_id."/".$encrypted_file;
			if($lib->encryptFile($target, $random_salt, $target1)){ 
				if($s3->putObjectFile($target1, $bucket , 'sa.png', S3::ACL_PUBLIC_READ)){
				echo 32;
				}
			unlink($target);
						//@unlink($decrypted_file);
//			//$lib->decryptFile($encrypted_file, $random_salt, $decrypted_file);
			
			
			$team_select=0;
			
			
			$desc_u=$team_u='';
			$desc_u=$_POST['text_desc'];
			$team_u=$_POST['share_select'];
			$permissions_u=$team_p="";
			if($team_u){
				if(strlen(strpos($team_u,"m_s_"))>0){
					$team_u=str_replace("m_s_","",$team_u);
					$team_p=$team_u;
					}
				if(strlen(strpos($team_u,"t_s_"))>0){
					$team_u='T'.str_replace("t_s_","",$team_u);
					}
			$team_t[]=($team_u);
			
			
			$permissions_u=serialize($team_t);
			}
			$file2_temp=array();
			$add="data/mem_folder_".$mem_id."/";
			$file_name=$add.$encrypted_file;
			

			$stm1=$mysqli->prepare("insert into `drive`.`files` (`location`,`MEM_ID`,`TEAM_ID`,`permissions`,`desc`,`salt`) values(?,?,?,?,?,?)");
			$stm1->bind_param('sissss',$file_name,$mem_id,$team_p,$permissions_u,$desc_u,$random_salt);
			$stm1->execute();
			$id_row=mysqli_insert_id($mysqli);
			$stm2=$mysqli->prepare("select `files` from `drive`.`members` where `MEM_ID`=$mem_id ");
			$stm2->execute();
			$stm2->bind_result($file2);
			$stm2->store_result();
			if($stm2->fetch()){
				if($file2){
				$file2_temp=unserialize($file2);}
				array_push($file2_temp,$id_row);
				$temp3=serialize($file2_temp);
				$stm1=$mysqli->prepare("update `drive`.`members` set `files`='".$temp3."' where `MEM_ID`=$mem_id");
					if($stm1->execute()){
						if(strlen(strpos($team_u,'T'))>0){
							$team_id=str_replace("T","",$team_u);
							$stm2=$mysqli->prepare("select `files` from `drive`.`teams` where `TEAM_ID`=$team_id ");
							$stm2->execute();
							$stm2->bind_result($file3);
							$stm2->store_result();
							if($stm2->fetch()){
								$file_temp=array();
								if($file3){
									$file_temp=unserialize($file3);
									}
								array_push($file_temp,$id_row);
								$temp4=serialize($file_temp);
								$stm4=$mysqli->prepare("update `drive`.`teams` set `files`='".$temp4."' where `TEAM_ID`=$team_id");
								if($stm4->execute()){
									header("Location:index.php");
									unset($_POST);
								}
								}				
							}
							else{
								header("Location:index.php");
									unset($_POST);
								}
						}
				
				}}
			
	}
	else{
	header("location:error.html");
	}

	}
	else{
	header("location:error.html");
	}
}
else{
	header("location:error.html");
	}
?>

<div class="global_container_outer">
	<div class="global_container_inner">
   	   <!--<div class="nav_bar_outer">
       		<div class="nav_bar_inner">
            	<div class="tit">
                	<h1>The Community Cloud</h1>
                </div>
                <div class="wel_msg">
                	<p></p>
                </div>
            </div>
       </div>-->
       <div class="main_container">
       			<span class="nav_top">
                	<div class="tit">
                		<h1>The Community Cloud</h1>
                        <img class="main_options" src="img/main_options.png" />
                        <img class="shelf_top" width="100%" src="img/shelf_top.png" /> 
               		 </div>
                	
                </span>
       		<section id="your_docs">
            	<div class="shelf">
                    <img src="img/shelf_bottom.png" />
                </div>
                <div class="shelf_content">
                	<div class="shelf_title_outer">
                        <p>Your documents</p>
					</div>
                	<div class="shelf_options">
                   	   <img src="img/options.png" />
                    </div>
                    <div class="shelf_main_outer">
                    	
                    </div>
                </div>
            </section>
            <section id="shared_docs">
            	<div class="shelf">
                	<img src="img/shelf_bottom.png" />
                </div>
                <div class="shelf_content">
                	<div class="shelf_title_outer">
                        <p>shared documents</p>
					</div>
                	<div class="shelf_options">
                   		 <img src="img/options.png" />
                    </div>
                    <div class="shelf_main_outer">
                    	
                    </div>
                </div>
            </section>
            
       </div>
      
    </div>
</div>
</body>
</html>
