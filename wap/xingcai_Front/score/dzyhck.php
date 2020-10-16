<div>
<form action="/index.php/score/dzyhcked" target="ajax" method="post" call="userck" dataType="html">
      
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="grayTable">
                <!---->
                	                                              <tr>
                  <td class="u_add_zl">存款人：</td>
                  <td class="u_add_zr" >
                      <label><?=$this->user['username']?></span></label>
                  </td>
              </tr>
              <tr>
                <td class="u_add_zl">账户余额：</td>
                <td class="u_add_zr" ><?=$this->user['coin']?></td>
              </tr>
              <tr>
                <td class="u_add_zl">存款时间：</td>
                <td class="u_add_zr" ><?=date('Y-m-d H:i',$this->time)?></td>
              </tr>
              <tr>
                <td class="u_add_zl">存款金额：</td>
                <td class="u_add_zr" ><input type="text" name="ckmoney" id="ckmoney" value="" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9./]/,'');}).call(this)" onblur="this.v();"/></td>
              </tr>
			  <tr>
                <td class="u_add_zl">资金密码：</td>
                <td class="u_add_zr" ><input type="password" name="coinpassword" id="coinpassword" value=""/></td>
              </tr>
			  <tr>
                <td class="u_add_zl">验证码：</td>
                <td class="u_add_zr" ><input type="text" style='width:50px;' name="vcode" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]/,'');}).call(this)" onblur="this.v();" maxlength="4"/><img width="58" height="32" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></td>
              </tr>
			
            
		
	
</form>
</div>