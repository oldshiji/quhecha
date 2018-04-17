<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/seller/new/promotion\search_goods.html";i:1517208469;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>选择商品</title>
    <link href="__PUBLIC__/static/css/base.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/static/css/seller_center.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
    <![endif]-->
    <script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/waypoints.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/myFormValidate.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="__PUBLIC__/static/js/html5shiv.js"></script>
    <script src="__PUBLIC__/static/js/respond.min.js"></script>
    <![endif]-->
    <style>
        .search-form {
            border-top: solid 1px #E6E6E6;
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: rgb(230, 230, 230);
        }
        a.ncap-btn-dis {
            font: normal 12px/20px "microsoft yahei";
            text-decoration: none;
            text-align: center;
            vertical-align: middle;
            display: inline-block;
            height: 20px;
            padding: 2px 9px;
            border: solid 1px;
            border-top-color: currentcolor;
            border-right-color: currentcolor;
            border-bottom-color: currentcolor;
            border-left-color: currentcolor;
            border-radius: 3px;
            background-color: #c5c5c5;
            color: rgb(119, 119, 119);
            border-color: #c5c5c5;
            cursor: auto;
            text-decoration: none;
        }
    </style>
</head>
<body style="min-width:0px;">
<div class="ncsc-layout wrapper" style="width: 1000px;margin: 0px;">
    <div id="layoutRight" class="ncsc-layout-right">
        <div class="main-content" id="mainContent">
            <form id="search-form2" method="get" action="<?php echo U('Promotion/search_goods'); ?>">
                <input name="prom_id" type="hidden" value="<?php echo \think\Request::instance()->param('prom_id'); ?>">
                <input name="nospec" type="hidden" value="<?php echo \think\Request::instance()->param('nospec'); ?>">
                <input name="prom_type" type="hidden" value="<?php echo $prom_type; ?>">
                <table class="search-form">
                    <tr>
                        <td><a onclick="select_goods();" title="确定添加商品" class="ncbtn ncbtn-aqua">确定添加商品</a></td>
                        <td></td>
                        <th class="w50">商品分类</th>
                        <td class="w100">
                            <select name="cat_id" id="cat_id" class="select">
                                <option value="">所有分类</option>
                                <?php if(is_array($categoryList) || $categoryList instanceof \think\Collection || $categoryList instanceof \think\Paginator): if( count($categoryList)==0 ) : echo "" ;else: foreach($categoryList as $k=>$v): if(in_array($v[id],$bind_class_id)): ?>
                                        <option value="<?php echo $v['id']; ?>" <?php if($v[id] == $cat_id): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <th class="w30">品牌</th>
                        <td class="w100">
                            <select name="brand_id" id="brand_id" class="select">
                                <option value="">所有品牌</option>
                                <?php if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): if( count($brandList)==0 ) : echo "" ;else: foreach($brandList as $k=>$v): ?>
                                    <option value="<?php echo $v['id']; ?>" <?php if($v[id] == $brand_id): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <th class="w70">新品/推荐</th>
                        <td class="w50">
                            <select name="intro" class="select">
                                <option value="0">全部</option>
                                <option value="is_new">新品</option>
                                <option value="is_recommend">推荐</option>
                            </select>
                        </td>
                        <th class="w40">关键词</th>
                        <td class="w100">
                            <input style="width: 90px;" class="text" type="text" name="keywords" value="<?php echo $keywords; ?>" placeholder="搜索词"/>
                            <input type="hidden" name="exvirtual" value="<?php echo \think\Request::instance()->param('exvirtual'); ?>"/>
                        </td>
                        <td class="w70 tc"><label class="submit-border"><input type="submit" class="submit" value="搜索" /></label></td>
                    </tr>
                </table>
            </form>
            <table class="ncsc-default-table">
                <thead>
                <tr>
                    <th class="w50"><input type="checkbox" class="checkAll">全选</th>
                    <th class="w200 tl">商品名称</th>
                    <th class="w100">价格</th>
                    <th class="w100">库存</th>
                    <th class="w100">商品ID</th>
                </tr>
                </thead>
                <tbody id="goos_table">
                <?php if(is_array($goodsList) || $goodsList instanceof \think\Collection || $goodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                    <tr class="bd-line" <?php if($list['prom_id'] > 0): ?>hidden<?php endif; ?>>
                        <td><input class="checkItem" type="checkbox" name="goods_id[]" value="<?php echo $list['goods_id']; ?>" data-img="<?php echo goods_thum_images($list['goods_id'],160,160); ?>"
                                   data-name="<?php echo $list['goods_name']; ?>" data-count="<?php echo $list['store_count']; ?>" data-price="<?php echo $list['shop_price']; ?>"/></td>
                        <td class="tl"><?php echo $list['goods_name']; ?></td>
                        <td><?php echo $list['shop_price']; ?></td>
                        <td><?php echo $list['store_count']; ?></td>
                        <td class="nscs-table-handle">
                            <span>
                        <!--        <a onclick="$(this).parent().parent().parent().remove();" class="btn-grapefruit"><i class="icon-trash"></i><p>删除</p></a>  -->
                                <a class="btn-grapefruit"><i class="icon-trash"></i><p><?php echo $list['goods_id']; ?></p></a>
                            </span>
                        </td>
                    </tr>
                    <?php if(!(empty($list[specGoodsPrice]) || (($list[specGoodsPrice] instanceof \think\Collection || $list[specGoodsPrice] instanceof \think\Paginator ) && $list[specGoodsPrice]->isEmpty()))): ?>
                        <tr class="bd-line" style="display: none" id="spec_goods_id_<?php echo $list['goods_id']; ?>">
                            <td></td>
                            <td class="tl" colspan=3>
                                <?php if(is_array($list[specGoodsPrice]) || $list[specGoodsPrice] instanceof \think\Collection || $list[specGoodsPrice] instanceof \think\Paginator): $i = 0; $__LIST__ = $list[specGoodsPrice];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$spec): $mod = ($i % 2 );++$i;if($spec['prom_id'] == 0): ?>
                                        <a data-item-id="<?php echo $spec['item_id']; ?>"
                                           data-key-name="<?php echo $spec['key_name']; ?>" data-store-count="<?php echo $spec['store_count']; ?>" data-price="<?php echo $spec['price']; ?>" data-spec-img="<?php echo $spec['spec_img']; ?>"
                                           title="<?php echo $spec['key_name']; ?>" class="<?php if($spec['prom_id'] == 0): ?>ncbtn specBtn <?php else: ?>ncap-btn-dis<?php endif; ?>"><?php echo $spec['key_name']; ?></a>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                            <td class="nscs-table-handle"></td>
                        </tr>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="20">
                        <?php echo $page; ?>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("input[type='checkbox']:checked").each(function(i,o){
            var goods_id = $(this).val();
            spec_goods_show(goods_id);
        })
    });
    //规格按钮点击事件
    $(function () {
        $(document).on("click", '.specBtn', function (e) {
            if($(this).hasClass('ncbtn-aqua')){
                $(this).removeClass('ncbtn-aqua');
            }else{
                $(this).addClass('ncbtn-aqua');
            }
        })
    })
    //全选选中事件
    $(function () {
        $(document).on("click", '.checkAll', function (e) {
            if($(this).is(':checked')){
                $('.checkItem').each(function(i,o){
                    $(o).attr('checked','checked');
                })
                $("input[type='checkbox']:checked").each(function(i,o){
                    var goods_id = $(this).val();
                    spec_goods_show(goods_id);
                })
                $('.specBtn').addClass('ncbtn-aqua');
            }else{
                $('.checkItem').each(function(i,o){
                    $(o).removeAttr('checked');
                })
                $("input[type='checkbox']").each(function(i,o){
                    var goods_id = $(this).val();
                    spec_goods_hide(goods_id);
                })
                $('.specBtn').removeClass('ncbtn-aqua');
            }
        })
    })
    //复选框选中事件
    $(function () {
        $(document).on("click", '.checkItem', function (e) {
            var goods_id = $(this).val();
            if($(this).is(':checked')){
                spec_goods_show(goods_id);
            }else{
                spec_goods_hide(goods_id);
            }
        })
    })
    function spec_goods_show(goods_id){
        var nospec = $('input[name=nospec]').val();
        if(nospec != 1){
            $('#spec_goods_id_'+goods_id).show();
        }
    }
    function spec_goods_hide(goods_id){
        $('#spec_goods_id_'+goods_id).hide();
    }
    //商品对象
    function GoodsItem(goods_id, goods_name, store_count, goods_price ,goods_image,spec) {
        this.goods_id = goods_id;
        this.goods_name = goods_name;
        this.store_count = store_count;
        this.goods_price = goods_price;
        this.goods_image = goods_image;
        this.spec = spec;
    }
    //商品对象
    function GoodsSpecItem(item_id, key_name, store_count, price ,spec_img) {
        this.item_id = item_id;
        this.key_name = key_name;
        this.store_count = store_count;
        this.price = price;
        this.spec_img = spec_img;
    }
    //确认按钮
    function select_goods()
    {
        var inputs = $("input[class='checkItem']:checked");
        if (inputs.length == 0) {
            layer.alert('请选择商品', {icon: 2}); //alert('请选择商品');
            return false;
        }
        var goodsArr = new Array();
        inputs.each(function(i,o){
            var goods_id = $(o).val();
            var spec = $('#spec_goods_id_'+goods_id);
            if(spec.length == 0){
                var goodsItem = new GoodsItem(goods_id, $(o).data('name'),$(o).data('count'), $(o).data('price'), $(o).data('img'), null);
                goodsArr.push(goodsItem);
            }else{
                var spec_a = spec.find('.ncbtn-aqua');
                var nospec = $('input[name=nospec]').val();
                if(spec_a.length == 0 && nospec != 1){
                    layer.alert($(o).data('name')+',请选择要参与活动的商品规格', {icon: 2});
                    return false;
                }else{
                    var goodsSpecItemArr = new Array();
                    spec_a.each(function(index,item){
                        var goodsSpecItem = new GoodsSpecItem($(item).data('item-id'),$(item).data('key-name'),$(item).data('store-count'),$(item).data('price'),$(item).data('spec-img'));
                        goodsSpecItemArr.push(goodsSpecItem);
                    })
                    goodsItem = new GoodsItem(goods_id, $(o).data('name'), $(o).data('count'),$(o).data('price'), $(o).data('img'), goodsSpecItemArr);
                    goodsArr.push(goodsItem);
                }
            }
        })
        if(goodsArr.length == 0){
            layer.alert('请至少选择一个商品');
            return false;
        }
        window.parent.call_back(goodsArr);
    }
</script>
</body>
</html>
