<? $a = $this->session->flashdata('error_message');?>
<?if(!empty($a)):?>
	<style>
		#error_msg{
			position: fixed;
			width: 30%;
			height: 35px;
			z-index: 99999;
			right: 10px;
			border-radius: 3px;
			text-align: center;
			padding-top: 30px;
			font-size: 100%;
			font-weight: bold;
			color: #fff;
			    text-shadow: 0 1px 0 #ad2516;
			    border: 1px solid #CB2C1A;
			    background: #D96D3A;
			    background: -moz-linear-gradient(top, #D96D3A 0%, #CB2C1A 100%);
			    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#D96D3A), color-stop(100%,#CB2C1A));
			    background: -webkit-linear-gradient(top, #D96D3A 0%, #CB2C1A 100%);
			    background: -o-linear-gradient(top, #D96D3A 0%,#CB2C1A 100%);
			    background: -ms-linear-gradient(top, #D96D3A 0%, #CB2C1A 100%);
			    background: linear-gradient(top, #D96D3A 0%,#CB2C1A 100%);
			    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#D96D3A', endColorstr='#CB2C1A',GradientType=0 ); 
			bottom: 10px;
			padding-bottom: 9px;
			opacity:0.95;
		}

		
	</style>
	<script>
		jQuery.fn.slideFadeToggle = function(speed, easing, callback){
			return this.animate({opacity: 'toggle',height: 'toggle'},speed,easing,callback);
		};
	</script>
	<div id="error_msg" style="display:none">
			<?=$a;?>
			<script>
				$(function(){
					$("#error_msg").slideFadeToggle('slow').delay(5000).slideFadeToggle('slow');
				})
			</script>
	</div>
<? endif;?>

<? $s = $this->session->flashdata('success_message');?>
<?if(!empty($s)):?>
	<style>
		#success_msg{
			position: fixed;
			width: 30%;
			height: 35px;
			z-index: 99999;
			right: 10px;
			border-radius: 3px;
			text-align: center;
			padding-top: 30px;
			font-size: 100%;
			font-weight: bold;
			color: #fff;
			    text-shadow: 0 1px 0 #677c13;
			    border: 1px solid #829E18;
			    background: #ADC800;
			    background: -moz-linear-gradient(top, #ADC800 0%, #829E18 100%);
			    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ADC800), color-stop(100%,#829E18));
			    background: -webkit-linear-gradient(top, #ADC800 0%, #829E18 100%);
			    background: -o-linear-gradient(top, #ADC800 0%,#829E18 100%);
			    background: -ms-linear-gradient(top, #ADC800 0%, #829E18 100%);
			    background: linear-gradient(top, #ADC800 0%,#829E18 100%);
			    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ADC800', endColorstr='#829E18',GradientType=0 );  
			bottom: 10px;
			padding-bottom: 9px;
			opacity:0.95;
		}

		
	</style>
	<script>
		jQuery.fn.slideFadeToggle = function(speed, easing, callback){
			return this.animate({opacity: 'toggle',height: 'toggle'},speed,easing,callback);
		};
	</script>
	<div id="success_msg" style="display:none">
			<?=$s;?>
			<script>
				$(function(){
					$("#success_msg").slideFadeToggle('slow').delay(5000).slideFadeToggle('slow');
				})
			</script>
	</div>
<? endif;?>