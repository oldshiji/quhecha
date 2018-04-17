<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"./application/admin/view2/finance\order_statis.html";i:1517208468;s:44:"./application/admin/view2/public\layout.html";i:1517208468;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
function delfunc(obj){
	layer.confirm('确认删除？', {
		  btn: ['确定','取消'] //按钮
		}, function(){
			$.ajax({
				type : 'post',
				url : $(obj).attr('data-url'),
				data : {act:'del',del_id:$(obj).attr('data-id')},
				dataType : 'json',
				success : function(data){
					layer.closeAll();
					if(data.status==1){
                        $(obj).parent().parent().parent().html('');
						layer.msg('操作成功', {icon: 1});
					}else{
						layer.msg('删除失败', {icon: 2,time: 2000});
					}
				}
			})
		}, function(index){
			layer.close(index);
		}
	);
}

function delAll(obj,name){
	var a = [];
	$('input[name*='+name+']').each(function(i,o){
		if($(o).is(':checked')){
			a.push($(o).val());
		}
	})
	if(a.length == 0){
		layer.alert('请选择删除项', {icon: 2});
		return;
	}
	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
			$.ajax({
				type : 'get',
				url : $(obj).attr('data-url'),
				data : {act:'del',del_id:a},
				dataType : 'json',
				success : function(data){
					layer.closeAll();
					if(data == 1){
						layer.msg('操作成功', {icon: 1});
						$('input[name*='+name+']').each(function(i,o){
							if($(o).is(':checked')){
								$(o).parent().parent().remove();
							}
						})
					}else{
						layer.msg(data, {icon: 2,time: 2000});
					}
				}
			})
		}, function(index){
			layer.close(index);
			return false;// 取消
		}
	);	
}

//表格列表全选反选
$(document).ready(function(){
	$('.hDivBox .sign').click(function(){
	    var sign = $('#flexigrid > table>tbody>tr');
	   if($(this).parent().hasClass('trSelected')){
	       sign.each(function(){
	           $(this).removeClass('trSelected');
	       });
	       $(this).parent().removeClass('trSelected');
	   }else{
	       sign.each(function(){
	           $(this).addClass('trSelected');
	       });
	       $(this).parent().addClass('trSelected');
	   }
	})
});

//获取选中项
function getSelected(){
	var selectobj = $('.trSelected');
	var selectval = [];
    if(selectobj.length > 0){
        selectobj.each(function(){
        	selectval.push($(this).attr('data-id'));
        });
    }
    return selectval;
}

function selectAll(name,obj){
    $('input[name*='+name+']').prop('checked', $(obj).checked);
}   

function get_help(obj){
	
	window.open("http://www.tp-shop.cn/");
	return false;
	
    layer.open({
        type: 2,
        title: '帮助手册',
        shadeClose: true,
        shade: 0.3,
        area: ['70%', '80%'],
        content: $(obj).attr('data-url'), 
    });
}

//
///**
// * 全选
// * @param obj
// */
//function checkAllSign(obj){
//    $(obj).toggleClass('trSelected');
//    if($(obj).hasClass('trSelected')){
//        $('#flexigrid > table>tbody >tr').addClass('trSelected');
//    }else{
//        $('#flexigrid > table>tbody >tr').removeClass('trSelected');
//    }
//}
/**
 * 批量公共操作（删，改）
 * @returns {boolean}
 */
function publicHandleAll(type){
    var ids = '';
    $('#flexigrid .trSelected').each(function(i,o){
//            ids.push($(o).data('id'));
        ids += $(o).data('id')+',';
    });
    if(ids == ''){
        layer.msg('至少选择一项', {icon: 2, time: 2000});
        return false;
    }
    publicHandle(ids,type); //调用删除函数
}
/**
 * 公共操作（删，改）
 * @param type
 * @returns {boolean}
 */
function publicHandle(ids,handle_type){
    layer.confirm('确认当前操作？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                // 确定
                $.ajax({
                    url: $('#flexigrid').data('url'),
                    type:'post',
                    data:{ids:ids,type:handle_type},
                    dataType:'JSON',
                    success: function (data) {
                        layer.closeAll();
                        if (data.status == 1){
                            layer.msg(data.msg, {icon: 1, time: 2000},function(){
                                location.href = data.url;
                            });
                        }else{
                            layer.msg(data.msg, {icon: 2, time: 3000});
                        }
                    }
                });
            }, function (index) {
                layer.close(index);
            }
    );
}
</script>
</head>
<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>商家结算管理</h3>
                <h5>网站系统商家结算索引与管理</h5>
            </div>
        </div>
    </div>
    <!-- 操作说明 -->
    <div id="explanation" class="explanation" style="color: rgb(44, 188, 163); background-color: rgb(237, 251, 248); width: 99%; height: 100%;">
        <div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示" id="explanationZoom" style="display: block;"></span>
        </div>
        <ul>
			<li>商家订单按时自动结算</li>
			<li></li>
			<li></li>
        </ul>
    </div>
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>商家结算列表</h3>
                <h5>(共<?php echo $pager->totalRows; ?>条记录)</h5>
            </div>
            <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
            <form class="navbar-form form-inline" id="search-form" method="get" action="<?php echo U('order_statis'); ?>" onsubmit="return check_form();">
                <input type="hidden" name="create_date" id="create_time" value="<?php echo $create_date; ?>">
                <div class="sDiv">
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="start_time" value="<?php echo $start_time; ?>" placeholder="起始时间" class="qsbox">
                        <input type="button" class="btn" value="起始时间">
                    </div>
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="end_time" value="<?php echo $end_time; ?>" placeholder="截止时间" class="qsbox">
                        <input type="button" class="btn" value="截止时间">
                    </div>
                    <div class="sDiv2">
                        <input size="30" placeholder="店铺id" value="<?php echo \think\Request::instance()->request('store_id'); ?>" name="store_id" class="qsbox" type="text">
                        <input class="btn" value="搜索" type="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="sign" axis="col0">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="article_title" axis="col3" class="">
                            <div style="text-align: center; width: 50px;" class="">记录ID</div>
                        </th>
                        <th align="center" abbr="ac_id" axis="col4" class="">
                            <div style="text-align: center; width: 50px;" class="">店铺id</div>
                        </th>
                        <th align="center" abbr="article_show" axis="col5" class="">
                            <div style="text-align: center; width: 100px;" class="">店铺名称</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 120px;" class="">开始时间</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 120px;" class="">结束时间</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 80px;" class="">订单商品金额</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">运费</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">平台抽成</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">积分金额</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">分销金额</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">优惠价</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 80px;" class="">优惠券抵扣</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 50px;" class="">本期应结</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="">
                            <div style="text-align: center; width: 120px;" class="">创建记录日期</div>
                        </th>
                        <th align="center" axis="col1" class="handle">
                            <div style="text-align: center; width: 150px;">操作</div>
                        </th>
                        <th style="width:100%" axis="col7">
                            <div></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv" style="height: auto;">
            <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
                <table>
                    <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="sign">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['id']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['store_id']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 100px;">
                                    <a class="open" href="<?php echo U('Store/store_info',array('store_id'=>$v[store_id])); ?>" target="blank">
                                        <?php echo $v['store_name']; ?><i class="fa fa-external-link " title="新窗口打开"></i>
                                    </a>
                                </div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 120px;"><?php echo date("Y-m-d H:i",$v['start_date']); ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 120px;"><?php echo date("Y-m-d H:i",$v['end_date']); ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 80px;"><?php echo $v['order_totals']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['shipping_totals']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['commis_totals']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['give_integral']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['distribut']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['order_prom_amount']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 80px;"><?php echo $v['coupon_price']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 50px;"><?php echo $v['result_totals']; ?></div>
                            </td>
                            <td align="center" class="">
                                <div style="text-align: center; width: 120px;"><?php echo date("Y-m-d H:i",$v['create_date']); ?></div>
                            </td>
                            <td align="center" class="handle">
                                <div style="text-align: center; width: 170px; max-width:170px;">
                                    <a href="<?php echo U('Order/index',array('order_statis_id'=>$v['id'])); ?>" class="btn blue"><i class="fa fa-search"></i>查看订单</a>
                                </div>
                            </td>
                            <td align="" class="" style="width: 100%;">
                                <div>&nbsp;</div>
                            </td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="iDiv" style="display: none;"></div>
        </div>
        <!--分页位置-->
        <?php echo $pager->show(); ?> </div>
</div>
<script>
    $(document).ready(function(){
        // 表格行点击选中切换
        $('#flexigrid > table>tbody >tr').click(function(){
            $(this).toggleClass('trSelected');
        });

        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });

        $('#start_time').layDate();
        $('#end_time').layDate();
    });

    function check_form(){
        var start_time = $.trim($('#start_time').val());
        var end_time =  $.trim($('#end_time').val());
        if(start_time == '' ^ end_time == ''){
            layer.alert('请选择完整的时间间隔', {icon: 2});
            return false;
        }
        if(start_time !== '' && end_time !== ''){
            $('#create_time').val(start_time+" - "+end_time);
        }
        return true;
    }
</script>
</body>
</html>