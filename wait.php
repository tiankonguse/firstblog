
<div class="progress-bar-wait-out">
	<div class="progress-bar-wait-in">
	  <div class="progress-bar-container">
		<div class="progress-bar-content">
		  <h1>tiankonguse博客正在努力加载中</h1>
		</div>		
		<!-- Progress bar -->
		<div id="progress_bar" class="ui-progress-bar ui-container">
		  <div class="ui-progress" style = "width: 0%;">
			<span class="ui-label" ><b class="value">0%</b></span>
		  </div>
		</div>
		
	  </div>
	</div>
</div>
<script  language="javascript">
(function( $ ){
  $.fn.animateProgress = function(option) {    
    return this.each(function() {
      $(this).animate({
        width: option.progress+'%'
      }, {
        duration: 1500, 
        step: function( progress ){
          var labelEl = $(option.label, this),
              valueEl = $(option.value, labelEl);
         
          if (Math.ceil(progress) == 100) {
            labelEl.text(option.done);
          }else{
            valueEl.text(Math.ceil(progress) + '%');
          }
        },
        complete: function(scope, i, elem) {
          if (option.callback) {
            option.callback.call(this, i, elem );
          };
        }
      });
    });
  };
})( jQuery );

function beginWait(newurl){
	$(".progress-bar-wait-out").show();
	$('.ui-progress-bar.ui-container .ui-progress').animateProgress({
		progress:100,
		label:".ui-label",
		value:".value",
		done:"加载完成",
		callback:function(){
			window.location.href=newurl;
		}
	});

}



</script> 