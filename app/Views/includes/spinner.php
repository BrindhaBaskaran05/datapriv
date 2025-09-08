<style>
#loader{
    position: fixed;
    left: 0%;
    top: 0%;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #ffffff6b;
}
.LoaderImage{
	    margin-left: 45%;
    margin-top: 10%;
}
#RetailerMsgDiv{
    display:none;
    color:red;
}

</style>
<div id='loader' style='display:none'>

<!--img src="/assets/img/ajax-loader2.gif"  class='LoaderImage'-->
<div class="spinner-border spinner-border-lg text-primary LoaderImage" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
</div>
<script>
  function showspinner(){
    document.getElementById('loader').style.display="";
  }
  function hidespinner(){
    document.getElementById('loader').style.display="none";
  }
  </script>