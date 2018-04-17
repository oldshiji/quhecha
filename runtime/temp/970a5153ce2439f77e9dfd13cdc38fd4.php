<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./template/mobile/mobile1/cart\cart2.html";i:1517389329;s:44:"./template/mobile/mobile1/public\header.html";i:1517208521;s:48:"./template/mobile/mobile1/public\header_nav.html";i:1517208521;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>填写订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="g4">

<div class="classreturn">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="<?php echo U('mobile/Cart/index'); ?>"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>填写订单</span>
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
<style>
    div.cuptyp{
        box-sizing: content-box;
        border: 2px solid transparent;
    }
    div.checked {
        border: 2px solid #e23435;
    }
    .phoneclck{
        /*部分手机不能点击问题*/
        cursor: pointer
    }
    #cart2_form input{
        width: 6rem;
        height: 1rem;
        font-size:.59733rem;
    }
</style>
<form name="cart2_form" id="cart2_form" method="post" style="position:fixed;left: 0;top: 0;z-index: 1000;">
    <input type="hidden" name="address_id" value="<?php echo $address['address_id']; ?>">
    <input type="hidden" name="pay_points" value="">
    <input type="hidden" name="user_money" value="">
    <input type="hidden" name="invoice_title" value="个人">
    <input type="hidden" name="paypwd" value="" hidden/>
    <!--立即购买才会用到-s-->
    <input type="hidden" name="action" value="<?php echo \think\Request::instance()->param('action'); ?>">
    <input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('goods_id'); ?>">
    <input type="hidden" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>">
    <input type="hidden" name="goods_num" value="<?php echo \think\Request::instance()->param('goods_num'); ?>">
    <!--立即购买才会用到-e-->
    <?php if(is_array($storeShippingCartList) || $storeShippingCartList instanceof \think\Collection || $storeShippingCartList instanceof \think\Paginator): $i = 0; $__LIST__ = $storeShippingCartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$store): $mod = ($i % 2 );++$i;?>
        <input type="hidden" name="shipping_code[<?php echo $store['store_id']; ?>]" value="">
        <input type="hidden" name="user_note[<?php echo $store['store_id']; ?>]" value="">
    <?php endforeach; endif; else: echo "" ;endif; ?>
</form>
    <div class="edit_gtfix">
        <a href="<?php echo U('Mobile/User/address_list',array('source'=>'cart2','goods_id'=>\think\Request::instance()->param('goods_id'),'goods_num'=>\think\Request::instance()->param('goods_num'),'item_id'=>\think\Request::instance()->param('item_id'),'action'=>\think\Request::instance()->param('action'))); ?>">
            <div class="namephone fl">
                <div class="top">
                    <div class="le fl"><?php echo $address['consignee']; ?></div>
                    <div class="lr fl"><?php echo $address['mobile']; ?></div>
                </div>
                <div class="bot">
                    <i class="dwgp"></i>
                    <span><?php echo $address['address']; ?></span>
                </div>
            </div>
            <div class="fr youjter">
                <i class="Mright"></i>
            </div>
            <div class="ttrebu">
                <img src="__STATIC__/images/tt.png"/>
            </div>
        </a>
    </div>

    <!--商品信息-s-->
    <div class="orders-list">
        <!--遍历店铺-->
        <?php if(is_array($storeShippingCartList) || $storeShippingCartList instanceof \think\Collection || $storeShippingCartList instanceof \think\Paginator): $i = 0; $__LIST__ = $storeShippingCartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$store): $mod = ($i % 2 );++$i;?>
            <div class="orders-item">
                <div class="shop-mes">
                    <div class="shop-logo"><img src="__STATIC__/images/s.png"/></div>
                    <h2 class="shop-name"><?php echo $store['store_name']; ?></h2>
                </div>
            <!--遍历商品-->
                <div class="goods-list">
                    <?php if(is_array($store[cartList]) || $store[cartList] instanceof \think\Collection || $store[cartList] instanceof \think\Paginator): $i = 0; $__LIST__ = $store[cartList];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>
                        <div class="goods-item p">
                            <div class="goods-pic"><img src="<?php echo goods_thum_images($cart['goods_id'],100,100); ?>" alt="" /></div>
                            <div class="goods-cont">
                                <h3 class="goods-title"><?php echo $cart['goods_name']; ?></h3>
                                <p class="goods-des">
                                    <?php if($store['qitian']): ?>
                                        <i class="return7"></i><span class="f_blue">支持七天无理由退货</span>
                                    <?php else: ?>
                                        <i class="return7 return7-dark"></i><span class="f_dark">不支持七天无理由退货</span>
                                    <?php endif; ?>
                                </p>
                                <div class="p">
                                    <p class="goods-price">￥<?php echo $cart['member_goods_price']; ?></p>
                                    <p class="goods-num">×<?php echo $cart['goods_num']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            <!--遍历商品-->
            <!--优惠券-s-->
                <div class="orders-other">
                    <div class="other-item coupon_click phoneclck"  data-storeid="<?php echo $store['store_id']; ?>"  data-storename="<?php echo $store['store_name']; ?>">
                        <div class="other-left">优惠券</div>
                        <div class="other-right">
                            <span style="line-height: 1.2rem;">
                                 <span class="setalit" id="counpn_<?php echo $store['store_id']; ?>">未使用</span>
                            </span>
                            <i class="arrow-right"></i>
                        </div>
                    </div>
                </div>
            <!--优惠券-e-->
            <!--配送方式-s-->
                <div class="orders-other">
                    <div class="other-item choice-express phoneclck" data-storeid="<?php echo $store['store_id']; ?>">
                        <div class="other-left">配送方式</div>
                        <div class="other-right" >
                            <span id="postname_<?php echo $store['store_id']; ?>" style="line-height: 1.2rem;">不选择，则按默认配送方式</span>
                            <span class="free-freight" id="store_shipping_price_<?php echo $store['store_id']; ?>"></span>
                            <i class="arrow-right"></i>
                        </div>
                    </div>
                    <div class="other-item">
                        <div class="other-left">备注 : </div>
                        <div class="other-right leave-word-box">
                            <textarea class="leave-word tapassa user_note_txt" data-store-id="<?php echo $store['store_id']; ?>" onkeyup="checkfilltextarea('.tapassa','30')"  placeholder="选填 : 对本次交易的说明最多30个字"></textarea>
                        </div>
                    </div>
                    <div class="other-item">
                        <div class="other-right">
                            <span class="other-num"></span>总重量 : <span class="other-price"><?php echo $store['store_goods_weight']; ?>g</span>
                        </div>
                    </div>
                </div>
            <!--配送方式-e-->
            </div>
            <!--配送弹窗-s-->
            <div class="losepay closeorder" style="display: ;" id="shipping_<?php echo $store['store_id']; ?>">
                <div class="m-lr-20">
                    <div class="l_top">
                        <span>配送方式</span>
                        <!--<em class="turenoff"></em>-->
                    </div>
                    <div class="resonco">
                        <?php if(is_array($store[shippingAreaList]) || $store[shippingAreaList] instanceof \think\Collection || $store[shippingAreaList] instanceof \think\Paginator): if( count($store[shippingAreaList])==0 ) : echo "" ;else: foreach($store[shippingAreaList] as $sk=>$shipping): ?>
                            <div class="radio">
                                <span class="che <?php if($sk == 0): ?>check_t<?php endif; ?>" data-shippingcode="<?php echo $shipping['shipping_code']; ?>" data-shippingname="<?php echo $shipping['plugin']['name']; ?>" data-storeid="<?php echo $store['store_id']; ?>">
                                    <i></i>
                                    <span><?php echo $shipping['plugin']['name']; ?></span>
                                </span>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="submits_de bagrr phoneclck" >确认</div>
            </div>
            <!--配送弹窗-e-->
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--商品信息-e-->

<!--使用余额，积分-s-->
    <div class="information_dr">
        <div class="maleri30">
            <div class="invoice list7">
                <div class="myorder p">
                    <div class="content30">
                        <a class="remain" href="javascript:void(0);">
                            <div class="order">
                                <div class="fl">
                                    <span>使用余额/积分</span>
                                </div>
                                <div class="fr">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="balance-li" class="invoice list7">
                <div class="myorder p">
                    <div class="content30">
                        <label>
                            <div class="incorise">
                                <span>使用余额：</span>
                                <input type="text" id="user_money" placeholder="可用余额为:<?php echo $user['user_money']; ?>" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onkeyup="this.value=/^\d+\.?\d{0,2}$/.test(this.value) ? this.value : ''" <?php if($user['user_money'] == 0): ?>disabled="disabled"<?php endif; ?>/>
                                <input id="user_money_button" type="button" value="使用" class="usejfye" />
                            </div>
                        </label>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <label>
                            <div class="incorise">
                                <span>使用积分：</span>
                                <input type="text" id="pay_points"  placeholder="可用积分为:<?php echo $user['pay_points']; ?>"  onpaste="this.value=this.value.replace(/[^\d]/g,'')" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" <?php if($user['pay_points'] == 0): ?>disabled="disabled"<?php endif; ?>/>
                                <input id="pay_points_button" type="button" value="使用" class="usejfye" />
                            </div>
                        </label>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <label>
                            <div class="incorise">
                                <span>优惠券码：</span>
                                <input type="text" id="coupon_code" name="coupon_code" placeholder="优惠券兑换码"/>
                                <input id="coupon_exchange" type="button" value="兑换" class="usejfye" />
                            </div>
                        </label>
                    </div>
                </div>
                <div class="myorder p" id="paypwd_view", style="display: none">
                    <div class="content30">
                        <label>
                            <div class="incorise">
                                <span>支付密码：</span>
                                <input style="display:none" type="password" name="paypwd"/>
                                <!--解决google浏览器识别text+password,自动填充已保存的账户密码-->
                                <input type="password" id="paypwd" placeholder="请输入支付密码"/>
                                <?php if(empty($user['paypwd'])): ?>
                                    <a href="<?php echo U('User/paypwd'); ?>" class="go-set-password">请先设置支付密码?</a>
                                <?php endif; ?>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--使用余额，积分-e-->
<script type="text/javascript">
    
    
          function toogle(id){            
            condition=$(id).attr('data');    
            str= "";
             //个人           
            if(condition=='geren'){      
         
                $('#monad').hide();
            }
            //单位
            if(condition=='danwei'){             
                 invoice_title=$('#invoice_title').val();                 
                $('#monad').show(); 
            }             
           
            invoice_title=$(id).find('input').attr('value');
            //不开发票
            if(condition=='noincorise'){              
//                $('#monad,#invoice').hide(); 
                
            }           
              $("input[type='radio']").each(function(){
                if($(this).is(":checked")){
                    if($(this).val()=="个人"){
                            invoice_title = "个人";
                            taxpayer      = "";
                            str           = "个人";
                    }  
                    if($(this).val()=='不开发票'){
                        invoice_title="";
                        taxpayer="";
                        invoice_desc='不开发票';
                        str="不开发票";
                    }
                    if($(this).val()=="单位"){                          
                            invoice_title = $("#invoice_title").val();
                            taxpayer      = $("#taxpayer").val();
                            str           = "单位";
                    }
                    if($(this).val()=='明细'){                       
                       invoice_desc="明细";
                    }  
                }  
             });    
            if($("#detail").is(":checked")){ 
                str+=" - 明细";
            }
              if(str=="不开发票"){
                $(".invoice_title").html(str);
            }else{
                $(".invoice_title").html("纸质（"+str+"）"); 
            }   
        }
       
        $(document).on("click","input[type='radio']",function(){           
            toogle(this);
        });
        function save_invoice(){         
            var str="";      
            var invoice_title;
            var taxpayer;
            var invoice_desc;
            var res="y";
            $("input[type='radio']").each(function(){
                if($(this).is(":checked")){
                    if($(this).val()=="个人"){
                            invoice_title = "个人";
                            taxpayer      = "";
                            str           = "个人";
                    }  
                    if($(this).val()=='不开发票'){
                        invoice_title="个人";
                        taxpayer="";
                        invoice_desc='不开发票';
                        str="不开发票";
                    }
                    if($(this).val()=="单位"){
                            if( $("#invoice_title").val()==""){
                                layer.open({content:'请输入单位名称',time:2});
                                res="n";
                                return false;
                            }else{
                                invoice_title = $("#invoice_title").val();
                                taxpayer      = $("#taxpayer").val();
                                str           = $("#invoice_title").val();
                            }
                           
                    }
                    if($(this).val()=='明细'){                       
                       invoice_desc="明细";
                    }  
                   
                }  
             });   
             
            if($("#detail").is(":checked")){ 
                str+=" - 明细";
            }
            if(str=="不开发票"){
                $(".invoice_title").html(str);
            }else{
                $(".invoice_title").html("纸质（"+str+"）"); 
            }
            if(res!="n"){
                var data = {invoice_title: invoice_title, taxpayer: taxpayer, invoice_desc: invoice_desc};
                $.post("<?php echo U('Cart/save_invoice'); ?>", data, function(json) {
                    var data = eval("(" + json + ")");
                    $("#invoice").hide()
                });
            }
        }
        
        function get_invoice(){
            var str="";
            $.get("<?php echo U('Cart/invoice'); ?>", function(json) {
                var data = eval("(" + json + ")");
                if (data.status > 0) {
                   
                    if(data.result.invoice_title==""){                       
                        $('#monad').hide();                    
                        str="不开发票";
                       
                    }else{
                        $('#invoice_title').val(data.result.invoice_title);
                        $("#invoice_desc").val(data.result.invoice_desc);
                        $("#taxpayer").val(data.result.taxpayer);
                        str="纸质（"+data.result.invoice_title+"-明细）"; 
                        $("#danwei").attr("checked","checked");
                    }     
                   if(data.result.invoice_title=="个人"){                       
                        $("#geren").attr("checked","checked");
                        $('#invoice_title').val("");
                        $("#invoice_desc").val("");
                        $("#taxpayer").val("");
                        $('#monad').hide();
                        $(".invoice_title").html("纸质（个人-明细）"); 
                         str="纸质（个人-明细）"; 
                    }
                    if (data.result.invoice_desc == "不开发票") { 
                        $('#invoice_title').val("");
                        $("#invoice_desc").val(data.result.invoice_desc);
                        $("#taxpayer").val("");
                        $("#noincorises").attr("checked","checked");
                        str="不开发票";
                    }else{
//                        $('#monad,#invoice').show(); 
                        $("#detail").attr("checked","checked");
                    }
                     $(".invoice_title").html(str);  
                    
                }else{
                    $("#geren").attr("checked","checked");
                    $('#monad').hide(); 
                    $("#noincorises").attr("checked","checked");  
                }
            });
        }
         
    
</script>

<div class="information_dr">
    <div class="maleri30">
    <div class="invoice list7">
        <div class="myorder p">
            <div class="content30">
                <a class="invoiceclickin" href="javascript:void(0)">
                    <div class="order">
                        <div class="fl">
                            <span>发票信息</span>
                        </div>
                        <div class="fr">
                            <span class="invoice_title" style="margin-top: 0.6rem;">不开发票</span>
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="invoice" class="invoice list7" style="display: none;">
        <div class="myorder p">
            <div class="content30">
                <div class="incorise" id="invoice_radio_title">
                    <span>发票抬头：</span>
                    
<!--                    <input type="radio" style="display: none;" value="个人" name="invoice_radio" <?php if($k == 'alipayMobile'): ?>checked<?php endif; ?> >
                    <input type="radio" style="display: none;" value="单位" name="invoice_radio" <?php if($k == 'alipayMobile'): ?>checked<?php endif; ?> >
                    <input type="radio" name="radiogeren"   />个人
                    
                    <input type="radio" name="radiogeren"   />单位-->
                    <div class="myorder radios-choice-h" >
                        <div class="incorise">
                            <label><input type="radio" value="个人" name="radio_title"  data="geren"   id="geren">个人</label>
                            <label><input type="radio" value="单位" name="radio_title"  data="danwei"  id="danwei" checked="checked">单位</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="myorder p" id="monad">
            <div class="incorise">
                <input type="text" id="invoice_title" value="" placeholder="请填写单位名称" />
                <input type="text" id="taxpayer" value="" placeholder="请在此填写纳税人识别号" />
            </div>
            <span style="display: block; color:red;font-size:.512rem;line-height: .64rem; ">开企业抬头发票，请准确填写对应的“纳税人识别号”，以免影响您的发票报销.</span>
        </div>
        <div class="myorder p" >
            <div class="content30">
                <div class="incorise">
                    <span>发票内容：</span>
                    <div class="myorder radios-choice-h" id="noincorise">
                        <div class="incorise">
                            <label><input type="radio" value="不开发票" name="radio_cont"  data="noincorise" id="noincorises">不开发票</label>
                            <label><input type="radio" value="明细"     name="radio_cont"  data="detail" id="detail">明细</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="myorder p" >
            <div class="content30">
                <div class="incorise">             
                    <div class="myorder p" >
                        <div class="content30">
                            <div class="incorise">
<!--                                <div class="submits_de bagrr phoneclck" >确认</div>-->
                                 <a href="javascript:void(0)" onclick="save_invoice()"  class="submits_de bagrr phoneclck" >确认</a>
                               </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
<!--        <div class="myorder p">
            <div class="content30">
                <div class="incorise">
                    <span>发票抬头：</span>
                    <input type="text" id="invoice_title" value="" placeholder="xx单位或xx个人" />
                </div>
            </div>
        </div>-->
        
        
    </div>
    </div>
</div>

<!--订单金额-s-->
<div class="information_dr ma-to-20">
    <div class="maleri30">
        <div class="xx-list">
            <p class="p">
                <span class="fl">商品总数：</span>
                <span class="fr red">共<span><?php echo $cartGoodsTotalNum; ?></span>件</span>
            </p>
            <p class="p">
                <span class="fl">商品金额：</span>
                <span class="fr red"><span>￥</span><span><?php echo $storeCartTotalPrice; ?></span>元</span>
            </p>
            <p class="p">
                <span class="fl">配送费用：</span>
                <span class="fr red" ><span id="postFee">0</span>元</span>
            </p>
            <p class="p">
                <span class="fl">优惠：</span>
                <span class="fr red" ><span id="order_prom_amount">0</span>元</span>
            </p>
            <p class="p">
                <span class="fl">使用优惠券：</span>
                <span class="fr red" ><span id="couponFee">0</span>元</span>
            </p>
            <p class="p">
                <span class="fl">使用积分：</span>
                <span class="fr red" ><span id="pointsFee">0</span>元</span>
            </p>
            <p class="p">
                <span class="fl">使用余额：</span>
                <span class="fr red" ><span id="balance">0</span>元</span>
            </p>
        </div>
    </div>
</div>
<!--订单金额-e-->

<!--提交订单-s-->
    <div class="mask-filter-div" style="display: none;"></div>
    <div class="payit fillpay ma-to-200">
        <div class="fr">
            <a href="javascript:void(0)" onclick="submit_order()">提交订单</a>
        </div>
        <div class="fl">
            <p><span class="pmo">应付金额：</span><span id="payables">0</span><span></span></p>
        </div>
    </div>
<!--提交订单-e-->

<!--优惠券弹窗-s-->
<div class="chooseebitcard newchoosecar coupongg" >
    <div class="choose-titr">
        <span>店铺：<em id="cl"></em></span>
        <i class="closer" onclick="closer()"></i>
    </div>
    <div class="soldout_cp p" id="emptyCoupon" style="display: none">
        <img class="nmy" src="__STATIC__/images/nmy.png" alt="" />
        <p class="nzw">当前店铺暂无可使用的优惠券</p>
    </div>
    <div class="c_uscoupon">
        <div class="maleri30">
            <div class="no_get_coupon">
                <p class="canus">可用优惠劵<span>（以下是当前店铺可使用的优惠劵）</span></p>
                <?php if(is_array($userCartCouponList) || $userCartCouponList instanceof \think\Collection || $userCartCouponList instanceof \think\Paginator): $i = 0; $__LIST__ = $userCartCouponList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$userCoupon): $mod = ($i % 2 );++$i;if($userCoupon[coupon][able] == 1): ?>
                        <div class="cuptyp storeid_<?php echo $userCoupon['store_id']; ?>" onclick="checkCoupon(this)"  data-date="<?php echo $userCoupon['coupon'][is_expiring]; ?>" data-coupon-id="<?php echo $userCoupon[id]; ?>" data-shopid="<?php echo $userCoupon['coupon'][store_id]; ?>" data-conponname="<?php echo $userCoupon['coupon'][name]; ?>">
                            <a href="javascript:;">
                                <div class="le_pri">
                                    <h1><em>￥</em><?php echo round($userCoupon['coupon'][money],0); ?></h1>
                                    <p>满<?php echo $userCoupon['coupon'][condition]; ?>元可用</p>
                                </div>
                                <div class="ri_int">
                                    <div class="to_two">
                                        <span class="ba">商城券</span>
                                        <span><?php echo $userCoupon['coupon'][name]; ?></span>
                                    </div>
                                    <div class="bo_two">
                                        <span class="cp9">有效期：<?php echo date('Y.m.d',$userCoupon[coupon][use_start_time]); ?>-<?php echo date('Y.m.d',$userCoupon[coupon][use_end_time]); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
<!--优惠券弹窗-e-->
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    //配送方式切换
    $(document).ready(function() {
        initShipping()
    })
    // 获取订单价格
    function ajax_order_price() {
        $("input[name='paypwd']").attr('value',$('#paypwd').val());
        $.ajax({
            type : "POST",
            url:"<?php echo U('Mobile/Cart/cart3'); ?>",
            dataType:'json',
            data: $('#cart2_form').serialize(),
            success: function(data){
                if (data.status != 1) {
                    layer.open({content:data.msg,time:2});
                    // 登录超时
                    if (data.status == -100){
                        location.href = "<?php echo U('Mobile/User/login'); ?>";
                    }
                    return false;
                }
                // console.log(data);
                $("#postFee").text('￥'+data.result.postFee); // 物流费
                if(data.result.couponFee == null){
                    $("#couponFee").text('-￥0');// 优惠券
                }else{
                    $("#couponFee").text('-￥'+data.result.couponFee);// 优惠券
                }
                $("#balance").text('-￥'+data.result.balance);// 余额
                $("#pointsFee").text('-￥'+data.result.pointsFee);// 积分支付
                $("#payables").text('￥'+data.result.payables);// 应付
                $("#order_prom_amount").text('-￥'+data.result.order_prom_amount);// 订单 优惠活动
                // 显示每个店铺的物流费
                for (v in data.result.store_shipping_price){
                    if(data.result.store_shipping_price[v] == 0){
                        $('#store_shipping_price_' + v).text('包邮');
                    }else{
                        $('#store_shipping_price_' + v).text('运费:￥'+data.result.store_shipping_price[v]+'元');
                    }
                }
                // 显示每个店铺订单优惠了多少钱
                for (v in data.result.store_order_prom_title){
                    if(data.result.store_order_prom_title[v] != '' && data.result.store_order_prom_title[v] != null){
                        $('#store_order_prom_title_' + v).text(data.result.store_order_prom_title[v]);
                        $('#store_order_prom_title_' + v).parent().show();
                    }
                }

            }
        });
    }
    // 提交订单
    ajax_return_status = 1; // 标识ajax 请求是否已经回来 可以进行下一次请求
    function submit_order() {
        $('.user_note_txt').each(function () {
            var store_id =  $(this).attr('data-store-id');
            $("input[name='user_note["+store_id+"]']").attr('value',$(this).val());
        })
        if (ajax_return_status == 0)
            return false;
        ajax_return_status = 0;
        $.ajax({
            type: "POST",
            url: "<?php echo U('Mobile/Cart/cart3'); ?>",//+tab,
            data: $('#cart2_form').serialize() + "&act=submit_order",// 你的formid
            dataType: "json",
            success: function (data) {
                if (data.status== 1){
                    layer.open({content:data.msg,time:2});
                    window.location.href = "/index.php?m=Mobile&c=Cart&a=cart4&master_order_sn=" + data.result;
                }else {
                    layer.open({content:data.msg,time:2});//执行有误
                    // 登录超时
                    if (data.status == -100)
                        location.href = "<?php echo U('Mobile/User/login'); ?>";
                    ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求
                    return false;
                }
            }
        });
    }

    //配送方式切换
    $(document).ready(function(){
        //显示弹窗
        $(document).on("click",'.choice-express',function () {
            cover();
            var storeid = $(this).data('storeid');
            $('#shipping_'+storeid).show();
        })
        //切换
        $('.radio .che').on('click',function(){
            $(this).addClass('check_t').parent().siblings('.radio').find('.che').removeClass('check_t');
        });
        //确定配送方式
        $(document).on("click",'.submits_de',function(){
            initShipping();
        });
    })
    //选择配送方式确定选择按钮
    function initShipping(){
        undercover();
        $('.check_t').each(function () {
            var storeid = $(this).data('storeid');
            var shippingname = $(this).data('shippingname');
            var shippingcode = $(this).data('shippingcode');
            $('#postname_' + storeid).text(shippingname);//写到店铺对应配送方式栏中
            $("input[name='shipping_code[" + storeid + "]']").attr('value', shippingcode);
        })
        $('.mask-filter-div').hide();
        $('.losepay').hide();
        ajax_order_price();
    }

    //使用积分，余额，兑换优惠券
    $(function(){
        $(document).on('blur', '#pay_points,#user_money', function() {
            useMoneyPoints(0)
        });
        $(document).on('click', '#pay_points_button,#user_money_button', function() {
            useMoneyPoints(1);
            ajax_order_price();
        });
        //兑换优惠券
        $(document).on("click", '#coupon_exchange', function (e) {
            var coupon_code = $('#coupon_code').val();
            if (coupon_code != '') {
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Home/Cart/cartCouponExchange'); ?>",
                    dataType: 'json',
                    data: {coupon_code: coupon_code},
                    success: function (data) {
                        layer.open({content:data.msg,time:2});
                        if (data.status == 1) {
                            window.location.reload()
                        }
                    }
                });
            }else{
                layer.open({content:'请输入优惠券码',time:2});
            }
        })
    })
    //使用余额，积分时显示隐藏支付密码
    function useMoneyPoints(t){
        var user_money = $.trim($('#user_money').val());
        var pay_points = $.trim($('#pay_points').val());
        if ((user_money !== '' && user_money >0) || (pay_points !== '' || pay_points >0)) {
            if(t==1){ //1是点击使用
                $("input[name='user_money']").attr('value',user_money);
                $("input[name='pay_points']").attr('value',pay_points);
            }
            $('#paypwd_view').show();
        } else {
            $('#paypwd_view').hide();
        }
    }

    //优惠券
    $(function(){
        $(document).on('click','.coupon_click',function(){
            cover();
            $('.coupongg').show();
            $('html,body').addClass('ovfHiden');
            var storeid = $(this).data('storeid');  //当前店铺ID
            var storename = $(this).data('storename');  //当前店铺名
            $('.cuptyp').hide();
            $('.storeid_'+storeid).show();  //显示当前店铺下的优惠券
            var coupon_length = $(".storeid_"+storeid).length;
            if(coupon_length == 0){
                $('.soldout_cp').show();
                $('.no_get_coupon').hide();
            }else{
                $('.no_get_coupon').show();
                $('.soldout_cp').hide();
            }
            $('#cl').html(storename);
        })
    })
    //关闭优惠券弹窗
       function closer(){
            undercover();
            $('.newchoosecar').hide();
            $('html,body').removeClass('ovfHiden');
        }

    //选择优惠券
    function checkCoupon(obj){
        $(obj).toggleClass('checked'); //选中样式
        var id=$(obj).data('shopid'); //获取 data-shopid
		//判断是否选中
        if($(obj).hasClass('checked')){
            var conponname = $(obj).data('conponname'); //获取 data-conponname
            $('#counpn_'+id).text(conponname);
            $(obj).siblings().each(function (i,o) {  //同一个商品只能选一个优惠券
                if($(o).data('shopid')==id){
                    $(o).removeClass('checked')
                }
            })
        }else{
            $('#counpn_'+id).text('未使用');
        }
        $('#cart2_form').find("input[name^='coupon_id']").remove();
        var couponList = $(obj).parent('.no_get_coupon').find('.checked');
        couponList.each(function (e,index) {
            if($(index).hasClass('checked')){
                var store_id = $(index).data('shopid');
                var store_coupon = $("input[name='coupon_id["+store_id+"]']");
                if(store_coupon > 0){
                    store_coupon.attr('value',$(index).data('coupon-id'));
                }else{
                    var input = document.createElement('input');  //创建input节点
                    input.setAttribute('type', 'hidden');  //定义类型是文本输入
                    input.setAttribute('value', $(index).data('coupon-id'));
                    input.setAttribute('name', "coupon_id["+store_id+"]");
                    document.getElementById('cart2_form').appendChild(input); //添加到form中显示
                }
            }
        })
        closer();
        ajax_order_price();
    }

    $(function() {
        get_invoice();
        //刷新把输入框变空
        $('#user_money').val('');
        $('#pay_points').val('');
        $('#invoice_title').val('')
        //显示隐藏使用发票信息
        $('.invoiceclickin').click(function () {
             
            $('#invoice').toggle(300);
            $('#monad,#invoice').show();
            get_invoice();
        })
        $(document).on('blur','#invoice_title',function(){
            var invoice_title = $.trim($('#invoice_title').val());
            $('.invoice_title').text(invoice_title);
            $("input[name='invoice_title']").attr('value',invoice_title)
        })
        //支付密码
        $(document).on('blur','#paypwd',function(){
            var paypwd = $.trim($('#paypwd').val());
            $("input[name='paypwd']").attr('value',paypwd)
        })
        $('.remain').click(function () {
            $('#balance').toggle(300);
        })
    })
    
    
</script>
</body>
</html>
