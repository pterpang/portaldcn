 <!-- Jquery Core Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('AdminBSB/plugins/bootstrap/js/bootstrap.js') }}"></script>

    	
	<!-- Slimscroll Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- jsPdf -->
    <script src="{{ asset('AdminBSB/plugins/jsPDF-master/dist/jspdf.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jsPDF-master/dist/html2canvas.min.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset('AdminBSB/plugins/toastr-master/build/toastr.min.js') }}"></script>


    <!-- Custom Js -->
    <script src="{{ asset('AdminBSB/js/admin.js') }}"></script>
	
	<script>
		$(document).ready(function(){
			$(".menu .list .ml-mainmenu").each(function(){
				if( $(this).hasClass("active") ){
					var mainmenuTitle = $(this).find(".mainmenu-title").html();
					$(".content-mainmenu").html( mainmenuTitle );
					var flag = 0;
					$(this).find('.submenu-title').each(function(){
						if($(this).parent().parent().hasClass('active')){
							flag = 1;
							$(".content-submenu").html($(this).html());
						}
					});
					if( flag == 0 ){
						$(".content-submenu").html( mainmenuTitle );
					}
				}
			});

			$("#btnLogout").click(function(e){
				e.preventDefault();
				$.ajax({
					url: '/logout',
					type: 'post',
                    data: {_token: '{{csrf_token()}}'},
					success: function(response){
						if(response.length == 0){
							window.location = "/login";
						}else{
							alert("Failed.");
						}
					},
					error: function(response){
						alert("Failed.");
					}
				});
			});
		});
	</script>
    