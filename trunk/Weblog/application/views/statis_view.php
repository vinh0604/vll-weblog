<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=$base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<style>
	span{ font-family:Georgia, "Times New Roman", Times, serif; color:#FF0000; font-size:18px}
	a{ font-family:"Times New Roman", Times, serif; font-size:14px; color:#993333; text-decoration:none;}
	#wp-post-comment{ width:45%; float:left; margin-right:10px;}
	#wp-draft-views{ width:45%; float:left; margin-left:10px; }
	#flot-views{ width:100%; height:200px;}
</style>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=$base_url()?>js/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function(){
	var data=[];
	var date= new Date();
	for (var i = 0; i<5; i++) {
		date.setDate(date.getDate() + 1);
		data.push([date.getTime(), i*20]);
	}
	var series= {
					color: 'yellow',
					data: data,
					bars: {
							show :true, 
							fill: true, 
							fillColor: { colors: [ { opacity: 0.8 }, { opacity: 0.1 } ] },  
							barWidth: 0.9, 
							align: 'center'}
				};
	var settings = {
						grid: {backgroundColor: '#C0C0C0'},
						xaxis: {mode: 'time', timeformat: '%d/%m'},
					};
    var plot = $.plot($("#flot-views"), [series], settings);
});
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Thống Kê</h2>
        
        <div id="wp-post-comment">
            <div class="widget-box" id="w-post">
                <h3 class="widget-title">Bài Viết</h3>
                <div class="widget-body">
                    	<table class="form-table">
                        	<thead>
                            	<th>Nội Dung</th>
                                <th>Thảo Luận</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span>9</span>&nbsp;<a href="#">Bài Viết</a><br/></td>
                                    <td><span>9</span>&nbsp;<a href="#">Phản hồi</a><br/></td>
                                </tr>
                                <tr>
                                    <td> <span>9</span>&nbsp;<a href="#">Trang</a><br/></td>
                                    <td><span>9</span>&nbsp;<a href="#">Bản Nháp</a><br/></td>
                                </tr>
                                <tr>
                                    <td> <span>9</span>&nbsp;<a href="#">Chuyên Mục</a><br/></td>
                                    <td><span>9</span>&nbsp;<a href="#">Spam</a><br/></td>
                                </tr>
                                <tr>
                                    <td><span>9</span>&nbsp;<a href="#">Thẻ</a><br/></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        
            <div class="widget-box" id="w-comment">
                <h3 class="widget-title">Phản Hồi</h3>
                <div class="widget-body">
                    
                </div>
            </div>
        </div>
        
        <div id="wp-draft-views">
			
			<div class="widget-box" id="w-write">
                <h3 class="widget-title">Viết Nhanh</h3>
                <textarea class="ckeditor" name="editor1"></textarea>
           </div>
			
            <div class="widget-box" id="w-draft">
                <h3 class="widget-title">Bản Nháp</h3>
                <div class="widget-body">
                    <div id="inside">
                        <ul id="list-draft" style="margin-left:10px;">
                            <li>
                                <a href="#">hello</a>
                                <abbr>Ngày 10 Tháng 11 Năm 2011</abbr>
                                <p>faddafasdfafda</p>
                            </li>
                            <li>
                                <a href="#">hello</a>
                                <abbr>Ngày 10 Tháng 11 Năm 2011</abbr>
                                <p>faddafasdfafda</p>
                            </li>
                            <li>
                                <a href="#">hello</a>
                                <abbr>Ngày 10 Tháng 11 Năm 2011</abbr>
                                <p>faddafasdfafda</p>
                            </li>
                            <li>
                                <a href="#">hello</a>
                                <abbr>Ngày 10 Tháng 11 Năm 2011</abbr>
                                <p>faddafasdfafda</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="widget-box" id="w-views">
                <h3 class="widget-title">Số lượt xem</h3>
                <div class="widget-body" id="flot-views">
                
                </div>
            </div>
       
       </div>
        
        
</div>
</div>
</body>
</html>