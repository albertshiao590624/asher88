<?php $this->display('inc_daohang1.php'); ?>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>

 
<style>
        .sel_btn{
            height: 35px;
            line-height: 21px;
            padding: 0 11px;
            background: #02bafa;
            border: 1px #26bbdb solid;
            border-radius: 3px;
            /*color: #fff;*/
            display: inline-block;
            text-decoration: none;
            font-size: 24px;
            outline: none;
			width:150px;
			text-align:center;
        }
        .ch_cls{
            background: #e4e4e4;
        }
    </style> 
   <section class="wraper-page">
   
   <a href="/index.php/score/dzyhck" style="margin-top: 20px;
    margin-left: 19%;
    width: 30%;
    font-size: 18px;
    line-height: 35px;
    height: 35px; background-color:#9a0636; color:#fff; border:none" class="sel_btn ch_cls" target="modal"  width="80%" title="存款" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">存款</a> 

	<a href="/index.php/score/ckmx" style="margin-top: 20px;
    margin-left: 7%;
    width: 30%;
    font-size: 18px;
    line-height: 35px;
    height: 35px;color: #fff; border:none" class="sel_btn">提款</a>
   <style>
		.contest{line-height:30px;}
		.contest table td{border:1px #000 solid; border-collapse:collapse; }
	</style>
	 <div class="activity_nr" style="padding:15px;">
		<h4 class="x-title">梦之城理财说明</h4>
		<div class='contest'>

<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px">1：理财投资按最少<?=$this->dzyhsettings['zdts']?>天计算，如果</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">理财时限</span></span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">没有达到</span><?=$this->dzyhsettings['zdts']?>天就提款</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">的</span></span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">，那么全额退还投资本金，此期间所参与的分红收益</span></span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">将扣除，另需支付</span><?=$this->dzyhsettings['txsxf']?>%的手续费</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px">&nbsp;<span style="font-family:微软雅黑 Light">。</span></span>
</p>
<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px">2：理财</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:15px"><span style="font-family:微软雅黑 Light">收益一览表：</span></span>
</p>
<table width="100%">
    <tbody>
        <tr class="firstRow">
            <td width="10%" valign="top" style="padding: 0px 7px; border-width: 1px; border-color: windowtext;">
                <p style="text-align:center">
                    <strong><span style="font-family: 微软雅黑;font-size: 16px">序</span></strong>
                </p>
            </td>
            <td width="60%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top-width: 1px; border-top-color: windowtext; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <strong><span style="font-family: 微软雅黑;font-size: 16px">金额</span></strong>
                </p>
            </td>
            <td width="15%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top-width: 1px; border-top-color: windowtext; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <strong><span style="font-family: 微软雅黑;font-size: 16px">日收益率</span></strong>
                </p>
            </td>
            <td width="15%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top-width: 1px; border-top-color: windowtext; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <strong><span style="font-family: 微软雅黑;font-size: 16px">出局倍数</span></strong>
                </p>
            </td>
        </tr>
        <tr>
            <td width="10%" valign="top" style="padding: 0px 7px; border-left-width: 1px; border-left-color: windowtext; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style="font-family:&#39;微软雅黑 Light&#39;;font-size:14px">1</span>
                </p>
            </td>
            <td width="60%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">1000元——4000元</span>
                </p>
            </td>
            <td width="15%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">1.5%</span>
                </p>
            </td>
            <td width="15%" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">2倍</span>
                </p>
            </td>
        </tr>
        <tr>
            <td width="49" valign="top" style="padding: 0px 7px; border-left-width: 1px; border-left-color: windowtext; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style="font-family:&#39;微软雅黑 Light&#39;;font-size:14px">2</span>
                </p>
            </td>
            <td width="235" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">5000元——9000元</span>
                </p>
            </td>
            <td width="142" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">2%</span>
                </p>
            </td>
            <td width="142" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">2倍</span>
                </p>
            </td>
        </tr>
        <tr>
            <td width="49" valign="top" style="padding: 0px 7px; border-left-width: 1px; border-left-color: windowtext; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style="font-family:&#39;微软雅黑 Light&#39;;font-size:14px">3</span>
                </p>
            </td>
            <td width="235" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">10000元——1000000元</span>
                </p>
            </td>
            <td width="142" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">3%</span>
                </p>
            </td>
            <td width="142" valign="top" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">2倍</span>
                </p>
            </td>
        </tr>
        <tr>
            <td width="49" valign="top" style="padding: 0px 7px; border-left-width: 1px; border-left-color: windowtext; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p style="text-align:center">
                    <strong><span style="font-family: &#39;微软雅黑 Light&#39;;font-size: 14px">备注</span></strong>
                </p>
            </td>
            <td width="519" valign="top" colspan="3" style="padding: 0px 7px; border-left: none; border-right-width: 1px; border-right-color: windowtext; border-top: none; border-bottom-width: 1px; border-bottom-color: windowtext;">
                <p>
                    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:14px">理财金额必须是1000元的倍数，零散投资金额没有额外收益。</span>
                </p>
            </td>
        </tr>
    </tbody>
</table>

<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">3</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">、</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">理财分享收益：</span>
</p>
<p style="margin-left:43px">
    <span style="font-family:Wingdings;font-size:16px">Ø&nbsp;</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">第一代日分红收益</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">的</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">20%。</span>
</p>
<p style="margin-left:43px">
    <span style="font-family:Wingdings;font-size:16px">Ø&nbsp;</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">第二代日分红收益</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">的</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">10%。</span>
</p>
<p style="margin-left:43px">
    <span style="font-family:Wingdings;font-size:16px">Ø&nbsp;</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">第三代日分红收益</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">的</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">5%。</span>
</p>
<p style="margin-left:43px">
    <span style="font-family:Wingdings;font-size:16px">Ø&nbsp;</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">第四代日分红收益</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">的</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">3%。</span>
</p>
<p style="margin-left:43px">
    <span style="font-family:Wingdings;font-size:16px">Ø&nbsp;</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">第五代日分红收益</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">的</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">1%。</span>
</p>
<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">备注：</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">自身</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">理财</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px"><span style="font-family:微软雅黑 Light">账号最低需要投资</span><?=$this->dzyhsettings['zdtz']?>元，没有投资</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">不能享受理财</span><span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">分享收益。</span>
</p>
<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">4、所有理财收益满100元提现或转入购彩余额。</span>
</p>
<p>
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">&nbsp;</span>
</p>
<p style="text-align:right">
    <span style=";font-family:&#39;微软雅黑 Light&#39;;font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:微软雅黑 Light">阿舍仔娛樂城平台</span></span>
</p>
<p>
    <br/>
</p>
		</div>
		
	</div>