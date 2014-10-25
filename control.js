/*
Javascript control for moving data around, etc.
Team 14
Code for Good Challenge (NY) 2014
*/

$(document).ready(function() {
    //$("input#taskdue").datepicker();
    $("#addScoreSubmit").click(function() {
        $("#scoreDisplay").append($.get("Score_Handler.php",{scoreDateField:$("#scoreDateField").val(), scoreScoreField:$("#scoreScoreField").val()},
        function(data) {
			$("#scoreDisplay").append(data); 
        }));
    });	
	
	// Handle adding a new curriculum
	$("#addCurriculumSubmit").click(function() {
        $.get("Curriculum_Handler.php")});
	
	// Load all the scores.
	$.ajax("Score_Handler.php?getAll=true")
		 .done(function(data) {
			$("#scoreDisplay").append(data);
			})
			.fail(function() {
			alert( "error" + data );
			})
			.always(function() {
			alert( "complete" + data );
			});
			
			
	// Load all curricula into the curricula list.
	$.ajax("Curriculum_Handler.php?getAll=true")
		 .done(function(data) {	
		 
			$("#curricula-list").append(data);
			
			})
			.fail(function() {
			alert( "error" + data );
			})
			.always(function() {
			alert( "complete" + data );
			});
			
	
	/*
    $("#deletebutton").click(function() {
        var ids = "";
        $("input:checked").each(function() {
            ids += $(this).attr('id') + " ";
        });
        $("input:checked").parent().parent().remove();
        $.post("Action_Delete.php",
        {'cmd':'Delete', 'ids':ids},
        function(data) { 
           //$("#tasklist").append(data); 
        });
    });*/
});

