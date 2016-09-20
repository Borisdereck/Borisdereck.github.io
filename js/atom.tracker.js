  $(function() {
      // New Task Form:
      $('#form-new').submit(function(event) {
          event.preventDefault();
          var form = $(this);
          //var task = $('#task').val();
          //console.log(task);
          var data = form.serialize();
          $.ajax({
              url: 'scripts/log.php',
							data: data


          });

      }); // END #form-new on submit

			$('#tally').load('scripts/log.php?mode=tally');
			$('#log').load('scripts/log.php?mode=build');
      // Restore Task:

  }); // END Document Ready
