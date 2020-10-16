
// 查询平台余额
function zzamount(t,game){
	// alert(game);
	t.val('正在查询...');
	$.ajax({
		url:'/index.php/lives/balances',
		data:{game:game},
		type:'post',
		dataType:'json',
		success:function(data){
			t.val(data);
		},
		error:function(data){
      console.log(data);
			t.val('查询失败');
		}

	})
	// 
}




// // 转入额度
function zamount(game){
	layer.prompt({title: '请输入金额', formType: 4}, function(amount, index){
  	layer.close(index); 
  	var index2 = layer.load(1, {
		  shade: [0.2,'#fff'] 
		});
  	if(isNaN(amount)){
  		layer.close(index2); 
  		layer.msg('请输入数字金额,不包含小数点。');
  	}else{
  		$.ajax({
  			url:'/index.php/lives/zamount',
  			data:{game:game,amount:amount},
  			type:'POST',
  			dataType:'json',
  			success:function(data){
  			layer.close(index2); 
  			if(data.state != '0'){
  				layer.alert(data.msg,{icon:1});
  				}else{
  				layer.alert(data.msg,{icon:2});
  				}

  			},
  			error:function(data){
  			layer.close(index2); 
  				console.log('error');
  			}	
  		})
  	}


	});

}


// // 转出
function pamount(game){
	layer.prompt({title: '请输入金额', formType: 4}, function(amount, index){
  	layer.close(index); 
  	var index2 = layer.load(1, {
		  shade: [0.2,'#fff'] 
		});
  	if(isNaN(amount)){
  		layer.close(index2); 
  		layer.msg('请输入数字金额,不包含小数点。');
  	}else{
  		$.ajax({
  			url:'/index.php/lives/pamount',
  			data:{game:game,amount:amount},
  			type:'POST',
  			dataType:'json',
  			success:function(data){
  			layer.close(index2); 
  			if(data.state != '0'){
  				layer.alert(data.msg,{icon:1});
  				}else{
  				layer.alert(data.msg,{icon:2});
  				}
  			},
  			error:function(data){
  				layer.close(index2); 
  				console.log('error');
  			}	
  		})
  	}


	});

}


function rechargedo(){
  var bankId = $("input[name='bankId']:checked").val();
  var amount = $('.othbox').val();
  // alert(bankId);
  if(isNaN(amount) || amount == ''){ 
      layer.msg('请输入数字金额,不包含小数点。');
  }else{
    $.ajax({
        url:'/index.php/Lives/userRecharge',
        data:{amount:amount,payId:bankId},
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err == '1'){
            if(data.type == 1){
				console.log(1);
            $('.tr_recharge').hide();
            $('.tr_recharge1').show();
            $('.ka').hide();
            $('#qrcode').attr('src',data.msg);
          }else{
            $('.tr_recharge').hide();
            $('.tr_recharge1').show();
            $('.er').hide();
            $('.bankName').html(data.bankname);
            $('.account').html(data.account);
            $('.address').html(data.address);
          }
          }else if(data.err == '2'){
              window.location.href = data.url;
            }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
  }
}

function payend(){
  var index = layer.alert('已完成儲值!工作人员正在审核!5分钟内未到帐请联系客服!', {icon: 6},function(){
      window.parent.location.reload();
      layer.close(index)
      
    });
}

// 提现
function subwithdraw(){
  var amount =$('#amount').val();
  var coinpwd =$('#coinpwd').val();
  var account =$('#account').val();
  if(account == ''){
    layer.alert('请新增收款银行卡',{icon:2});
  }
if(amount == '' || coinpwd == ''){
    layer.alert('您的输入有误',{icon:2});
  }else{
    $.ajax({
        url:'/Withdraw/submitdo',
        data:{amount:amount,coinpwd:coinpwd},
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != '0'){
            layer.alert(data.msg, {icon: 6},function(){
               window.parent.location.reload();
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
  }

}

function subBankInfo(){
  var bankName = $('#bankName').val();
  var account = $('#account').val();
  var name = $('#name').val();
  var counName = $('#counName').val();
  if(bankName == '' || account == '' || name == '' || counName == ''){
    layer.alert('您的输入有误',{icon:2});
  }else{
    $.ajax({
        url:'/user/bindBankdo',
        data:{bankId:bankName,cardNo:account,subAddress:counName,fullName:name},
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != '0'){
            layer.alert(data.msg, {icon: 6},function(){
               window.parent.location.reload();
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
  }
}





function setpass(){
  var newpass = $('#newpass').val();
  var oldpass = $('#oldpass').val();
  if(newpass == '' || oldpass == ''){
    layer.alert('您的输入有误',{icon:2});
  }else{
     $.ajax({
        url:'/user/setPassword',
        data:{newpass:newpass,oldpass:oldpass},
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != '0'){
            layer.alert(data.msg, {icon: 6},function(){
               window.parent.location.reload();
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
  }
}



function setcoinpass(){
  var loginpwd = $('#password').val();
  var coinpwd = $('#newcoinpass').val();
  if(newpass == '' || oldpass == ''){
    layer.alert('您的输入有误',{icon:2});
  }else{
     $.ajax({
        url:'/user/setFundPwddo',
        data:{loginpwd:loginpwd,coinpwd:coinpwd},
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != '0'){
            layer.alert(data.msg, {icon: 6},function(){
               window.parent.location.reload();
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
  }
}


function reginterDo(){
  // console.log($('#form-article-add').serialize());
   $.ajax({
        url:'/user/registered',
        data:$('#form-article-add').serialize(),
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != 'false'){
            layer.alert(data.msg, {icon: 6},function(){
               window.parent.location.reload();
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
}


function reginterEd(){
  // console.log($('#form-article-add').serialize());
   $.ajax({
        url:'/user/registered',
        data:$('#form-article-add').serialize(),
        type:'POST',
        dataType:'json',
        success:function(data){
        if(data.err != 'false'){
            layer.alert(data.msg, {icon: 6},function(){
               window.location.href = '/';
         });
          }else{
            layer.alert(data.msg,{icon:2});
          }
        },
        error:function(data){
          console.log(data);
        } 
      })
}
