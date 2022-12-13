$(function()
    {
        $( " #niv_id " , "#ec_ens" ).change(
        function()
            {
            var niv_id = $( " #niv_id option:selected " , "#ec_ens" ).val();
            console.log(niv_id);

                $("#S1").css("display", "none");
                $("#S2").css("display", "none");
                $("#S3").css("display", "none");
                $("#S4").css("display", "none");
                $("#S5").css("display", "none");
                $("#S6").css("display", "none");
                $("#S7").css("display", "none");
                $("#S8").css("display", "none");
                $("#S9").css("display", "none");

                if(niv_id == 1) // Niveau L1
                {
                    $("#S1").css("display", "inline");
                    $("#S2").css("display", "inline");
                }
                else if( niv_id == 2 ) // Niveau L2
                {
                    $("#S3").css("display", "inline");
                    $("#S4").css("display", "inline");
                }
                else if( niv_id == 3 ) // Niveau L3
                {
                    $("#S5").css("display", "inline");
                    $("#S6").css("display", "inline");
                }
                else if( niv_id == 4 ) // Niveau M1
                {
                    $("#S7").css("display", "inline");
                    $("#S8").css("display", "inline");
                }
                else if( niv_id == 5 ) // Niveau M2
                {
                    $("#S9").css("display", "inline");
                }
            }
        )
    }
);


$(function()
    {
        $( "#sem_id" , "#ec_ens"  ).change(
        function()
            {
            var sem_id = $( "input[type=radio][name=sem_id]:checked" , "#ec_ens" ).val();
            console.log(sem_id);

                $("#p_1").css("display", "none");
                $("#p_2").css("display", "none");
                $("#p_3").css("display", "none");
                $("#p_4").css("display", "none");
                $("#p_5").css("display", "none");
                $("#p_6").css("display", "none");
                $("#p_7").css("display", "none");
                $("#p_8").css("display", "none");
                $("#p_9").css("display", "none");

                if(sem_id == 6) // Parcours S6
                {
                    $("#p_1").css("display", "inline");
                    $("#p_2").css("display", "inline");
                }
                else if(sem_id == 8) // Parcours S8
                {
                    $("#p_3").css("display", "inline");
                    $("#p_4").css("display", "inline");
                    $("#p_5").css("display", "inline");
                    $("#p_6").css("display", "inline");
                }
                else if(sem_id == 9) // Parcours S9
                {
                    $("#p_7").css("display", "inline");
                    $("#p_8").css("display", "inline");
                    $("#p_9").css("display", "inline");
                }
            }
        )
    }
);

$(function()
    {
		$( " #vh , #ec_ens ").change(
		function()
			{
				var vh_selected = $( " #vh option:selected " ).val();
				$( " #credit " ).val( Math.round( vh_selected * 0.1 ) );
			}
		)
	}
);

$(function()
    {
		$( " #elc_id , #ec , #ec_ens ").change(
		function()
			{
                var elc_id = $( " #elc_id option:selected " ).val();

                if( elc_id != "" && elc_id != null )
                {
                    $("#ec").val("");
                }
			}
		)
	}
);

// _______________________________________________________________________________________________________________________________________________________

$(function()
    {
        $( " #niv_id " , "#regroupement" ).change(
        function()
            {
            var niv_id = $( " #niv_id option:selected " , "#regroupement" ).val();
            console.log(niv_id);

                $("#S1").css("display", "none");
                $("#S2").css("display", "none");
                $("#S3").css("display", "none");
                $("#S4").css("display", "none");
                $("#S5").css("display", "none");
                $("#S6").css("display", "none");
                $("#S7").css("display", "none");
                $("#S8").css("display", "none");
                $("#S9").css("display", "none");

                if(niv_id == 1) // Niveau L1
                {
                    $("#S1").css("display", "inline");
                    $("#S2").css("display", "inline");
                }
                else if( niv_id == 2 ) // Niveau L2
                {
                    $("#S3").css("display", "inline");
                    $("#S4").css("display", "inline");
                }
                else if( niv_id == 3 ) // Niveau L3
                {
                    $("#S5").css("display", "inline");
                    $("#S6").css("display", "inline");
                }
                else if( niv_id == 4 ) // Niveau M1
                {
                    $("#S7").css("display", "inline");
                    $("#S8").css("display", "inline");
                }
                else if( niv_id == 5 ) // Niveau M2
                {
                    $("#S9").css("display", "inline");
                }
            }
        )
    }
);

$(function()
    {
        $( "#sem_id" , "#regroupement"  ).change(
        function()
            {
            var sem_id = $( "input[type=radio][name=sem_id]:checked" , "#regroupement" ).val();
            console.log(sem_id);

                $("#p_1").css("display", "none");
                $("#p_2").css("display", "none");
                $("#p_3").css("display", "none");
                $("#p_4").css("display", "none");
                $("#p_5").css("display", "none");
                $("#p_6").css("display", "none");
                $("#p_7").css("display", "none");
                $("#p_8").css("display", "none");
                $("#p_9").css("display", "none");

                if(sem_id == 6) // Parcours S6
                {
                    $("#p_1").css("display", "inline");
                    $("#p_2").css("display", "inline");
                }
                else if(sem_id == 8) // Parcours S8
                {
                    $("#p_3").css("display", "inline");
                    $("#p_4").css("display", "inline");
                    $("#p_5").css("display", "inline");
                    $("#p_6").css("display", "inline");
                }
                else if(sem_id == 9) // Parcours S9
                {
                    $("#p_7").css("display", "inline");
                    $("#p_8").css("display", "inline");
                    $("#p_9").css("display", "inline");
                }
            }
        )
    }
);


$(function()
    {
		$( " #salle_id , #salle , #regroupement ").change(
		function()
			{
                var salle_id = $( " #salle_id option:selected " ).val();

                if( salle_id != "" && salle_id != null )
                {
                    $("#salle").val("");
                }
			}
		)
	}
);

$(function()
    {
		$( " #ec_ens_id , #ens , #regroupement ").change(
		function()
			{
				var ec_ens_id = $( " #ec_ens_id option:selected " ).val();
                var ens = ec_ens_id.split("|")[2];
                if( ec_ens_id == "" || ec_ens_id == null )
                {
                    $( " #ens " ).val( "" ) ;
                }
                else
                {
                    $( " #ens " ).val( ens ) ;
                }
			}
		)
	}
);