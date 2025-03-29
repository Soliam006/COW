document.observe('dom:loaded', function() {
    $('hotelSearch').observe('keyup', function(event) {
      var query = event.element().value;
      new Ajax.Request('filtrar_hoteles.php', {
        method: 'get',
        parameters: { q: query },
        onSuccess: function(response) {
          // Actualizamos el contenedor de hoteles con el HTML filtrado
          $('hotelesContainer').update(response.responseText);
        },
        onFailure: function() {
          alert('Error al filtrar los hoteles.');
        }
      });
    });
  });
  