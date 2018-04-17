<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"./template/mobile/mobile1/index\street.html";i:1517208521;s:44:"./template/mobile/mobile1/public\header.html";i:1517208521;s:48:"./template/mobile/mobile1/public\header_nav.html";i:1517208521;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>店铺街--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
<!--    <link rel='stylesheet' href="__STATIC__/css/base.css">
    <link rel='stylesheet' href="__STATIC__/css/mobile.css">-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
   <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <style>
        body footer {
            height: 2rem;
        }
        body footer ul li .b-icon {
            width: .84rem;
            height: .84rem;
            margin: .2rem auto 0;
        }
        body footer ul li .b-wen {
            margin-top: .2rem; 
            font-size: .48rem;
        }
    </style>
</head>
<body class="[body]">

<div class="classreturn">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>店铺街</span>
        </div>
        <div class="ds-in-bl menu">
            <a href="javascript:void(0);"><img src="__STATIC__/images/class1.png" alt="菜单"></a>
        </div>
    </div>
</div>
<div class="flool tpnavf">
    <div class="footer">
        <ul>
            <li>
                <a class="yello" href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>首页</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Goods/categoryList'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分类</p>
                    </div>
                </a>
            </li>
            <li>
                <!--<a href="shopcar.html">-->
                <a href="<?php echo U('Cart/index'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
		<!--banner1-start-->
		<div class="banner">
			<img src="__STATIC__/images/fb.jpg"/>
		</div>
		<!--banner1-end-->
		<nav class="storenav p">
			<ul>
				<li>
				<a href="javascript:void(0)" onclick="locationaddress(this);">
                    <script type="text/javascript">
                        function locationaddress(e){
                            $('.container').animate({width: '14.4rem', opacity: 'show'}, 'normal',function(){
                                $('.container').show();
                            });
                            if(!$('.container').is(":hidden")){
                                $('body').css('overflow','hidden')
                                cover();
                                $('.mask-filter-div').css('z-index','9999');
                            }
                        }
                        function closelocation(){
                            var province_div = $('.province-list');
                            var city_div = $('.city-list');
                            var area_div = $('.area-list');
                            if(area_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.show();
                                province_div.hide();
                                return;
                            }
                            if(city_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.hide();
                                province_div.show();
                                return;
                            }
                            if(province_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.hide();
                                $('.container').animate({width: '0', opacity: 'show'}, 'normal',function(){
                                    $('.container').hide();
                                });
                                undercover();
                                $('.mask-filter-div').css('z-index','inherit');
                                return;
                            }
                        }
                    </script><span class="dq" ></span></a>
					<i></i>
					<!--地区获取输出-s-->
					<!-- <div class="dqs" style="display:none;">
						<input id="address" type="text" readonly="" placeholder="城市选择"  value=""/>
	            		<input id="province_id" type="hidden" value=""/>
	            		<input id="city_id"     type="hidden" value=""/>
	            		<input id="district_id" type="hidden" value=""/>
	            		<input id="all" type="hidden" value="0"/>
	            		<input id="area" type="hidden" value="0"/>
            		</div> -->
            		<!--地区获取输出-e-->
				</li>
                <li>
                    <span class="lb">类别</span>
                    <i></i>
                </li>
				<li>
                    <a onclick="showAllStreet()">
                        <span>全部店铺</span>
                    </a>
				</li>
			</ul>
		</nav>
		<div class="lb_showhide p">
            <i class="closer"></i>
			<ul style="margin-top: 1rem;">
                <li><a href="javascript:showAllClass();">全部分类</a></li>
                <?php if(is_array($store_class) || $store_class instanceof \think\Collection || $store_class instanceof \think\Paginator): $i = 0; $__LIST__ = $store_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?>
                    <li><a href="javascript:setCat_id(<?php echo $sc['sc_id']; ?>);"><?php echo $sc['sc_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="store_info" id="store_list">
		
		</div>
		<!--选择地区-s-->
        <div class="container" >
            <div class="city">
                <div class="screen_wi_loc">
                    <div class="classreturn loginsignup">
                        <div class="content">
                            <div class="ds-in-bl return seac_retu">
                                <a href="javascript:void(0);" onclick="closelocation();"><img src="__STATIC__/images/return.png" alt="返回"></a>
                            </div>
                            <div class="ds-in-bl search center">
                                <span class="sx_jsxz">选择地区</span>
                            </div>
                            <div class="ds-in-bl suce_ok">
                                <a href="javascript:void(0);">&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="province-list"></div>
                <div class="city-list" style="display:none"></div>
                <div class="area-list" style="display:none"></div>
            </div>
        </div>
        <!--选择地区-e-->
		<!--底部导航-start-->
		</include file="public/footer_nav"/>
		<!--底部导航-end-->
		<div class="mask-filter-div"></div>
<script type="text/javascript" src="__STATIC__/js/mobile-location.js"></script>
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
	    $(function () {
            ajax_sourch_submit();
            /*getSite();*/
            select_area_callback(province_name , city_name , district_name);
            showAllStreet();
	    });

        //选择地址回调
        function select_area_callback(province_name , city_name , district_name , province_id , city_id , district_id){
            var area = province_name+','+city_name+','+district_name;
            if(area !=''){
                $('.dq').text(area.substring(0,8));
                $("#area").val(area);
                $("input[name=province]").val(province_id);
                $("input[name=city]").val(city_id);
                $("input[name=district]").val(district_id);
            }else{
                $('.dq').text('选择地区');
            }
        }
	    /**
	     * 加载分类店铺
	     */
	    function setCat_id(cid) {
	        $("#store_list").html('');
	        undercover();
	        $('.lb_showhide').hide(); //分类列表
	        page = 0; //分页
	        cat_id = cid; //分类id 
            page++;
            $.ajax({
                type: "get",
                url: "/index.php?m=Mobile&c=Index&a=ajaxStreetList2&",
                dataType: 'html',
                data:{
                        'p': page,
                        'sc_id': cat_id,
                    },
                success: function (data) {
                    if (data) {
                        $("#store_list").append(data);
                        $('.get_more').hide();
                    } else {
                        $('#getmore').show();
                        return false;
                    }
                }
            });
	    }
        var page = 1;//页数
        var cat_id = '';//店铺分类id
	    /**
	     * 加载店铺
	     */
	    function ajax_sourch_submit() {
            page++;
            console.log(page);
            var province_id = $('#province_id').val();
            var city_id = $('#city_id').val();
            var district_id =$('#district_id').val();
            var all =$('#all').val();
	        $.ajax({
	            type: "get",
	            url: "/index.php?m=Mobile&c=Index&a=ajaxStreetList2&",
	            dataType: 'html',
                data:{'p':page,'sc_id':cat_id,'province_id':province_id,'city_id':city_id,'district_id':district_id,'all':all},
	            success: function (data) {
	                if (data) {
	                    $("#store_list").append(data);
	                    $('.get_more').hide();
	                } else {
                        $('#getmore').show();
                        return false;
	                }
	            }
	        });
	    }
        function ajax_sourch_submit2() {
            page++;
            $.ajax({
                type: "get",
                url: "/index.php?m=Mobile&c=Index&a=ajaxStreetList2&",
                dataType: 'html',
                data:{
                        'p': page,
                        'sc_id': cat_id,
                        // 'province_id': province_id,
                        // 'city_id': city_id,
                        // 'district_id': district_id,
                        // 'all':all
                    },
                success: function (data) {
                    if (data) {
                        $("#store_list").append(data);
                        $('.get_more').hide();
                    } else {
                        $('#getmore').show();
                        return false;
                    }
                }
            });
        }
        $(function(){
            $(document).on("click", '.area-list p', function (e) {
                cat_id = '';
                $("#store_list").empty();
                page = 0   //页码重置
                ajax_sourch_submit();
            });
            $(document).on("click", '.closer', function (e) {
                undercover();
                $('.lb_showhide').hide();
            });
        });
		$(function(){
			$('.storenav ul li').click(function(){
				$(this).addClass('red').siblings('li').removeClass('red')
			});
			
			$('.storenav ul li .lb').click(function(){
				$('.lb_showhide').show();
				cover();
			});
			
			$('.storenav ul li .dq').click(function(){
                alert(123);
				$(this).siblings('.dqs').find('#dq').click();
			});
		});
        //收藏店铺
        function favoriteStore(id) {
            if(getCookie('user_id')<=0 || getCookie('user_id')==''){
                layer.open({content:'请先登录',time:1});
                return false;
            }
            var old_num = parseInt($('.store_collect_'+id).text());
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {store_id: id},
                url: "/index.php/Home/Store/collect_store",
                success: function (data) {
                    if (data.status == 1) {
                        layer.open({content:data.msg,time:1});
                        $('.store_collect_'+id).text(old_num+1);
                        $('#store_'+id).html('<a href="javascript:void(0)" class="collect">已关注</a>')
                    } else {
                        layer.open({content:data.msg,time:1});
                    }
                }
            });
        }
		
		//加载全部店铺
        function showAllStreet() {
            $('.dq').text('选择地区')
            $('#all').val(1)
            $("#store_list").html('');
            $('#province_id').attr('value',0);
            $('#city_id').attr('value',0);
            $('#district_id').attr('value',0);
            cat_id = 0;
            $.ajax({
                type: "get",
                url: "/index.php?m=Mobile&c=Index&a=ajaxStreetList&",
                dataType: 'html',
                data:{'p':1,'sc_id':0,'province_id':0,'city_id':0,'district_id':0,'all':1},
                success: function (data) {
                    if (data) {
                        $("#store_list").append(data);
                        $('.get_more').hide();
                    } else {
                        $('#getmore').show();
                        return false;
                    }
                }
            });
        }

        //加载全部分类
        function showAllClass() {
            $('.dq').text('选择地区')
            $('#all').val(1)
            $("#store_list").html('');
            $('#province_id').attr('value',0);
            $('#city_id').attr('value',0);
            $('#district_id').attr('value',0);
            $(".lb_showhide").hide();
            undercover();
            cat_id = 0;
            $.ajax({
                type: "get",
                url: "/index.php?m=Mobile&c=Index&a=ajaxStreetList&",
                dataType: 'html',
                data:{'p':1,'sc_id':0,'province_id':0,'city_id':0,'district_id':0,'all':1},
                success: function (data) {
                    if (data) {
                        $("#store_list").append(data);
                        $('.get_more').hide();
                    } else {
                        $('#getmore').show();
                        return false;
                    }
                }
            });
        }
		</script>
	</body>
</html>