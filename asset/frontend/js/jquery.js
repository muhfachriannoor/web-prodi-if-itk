jQuery(function()
{
  var urlnya = 'http://if.itk.ac.id/frontend/';	
	$("#filter-berita").change(function(event) // filterin berita terbaru terlama
  	{
  		event.preventDefault();
	    var filter = $("#filter-berita option:selected").val()
	    $.ajax({
      		url: urlnya+'berita/filter/',
      		data : {'filter': filter},
      		type : 'get',
      		cache: false,
	    	success: function(response){
		        $("#berita-tampil").html(response);
      		} 
    	});
  	})

  $("#filter-kategori").change(function(event) // filterin berita
    {
      event.preventDefault();
      var filter = $("#filter-kategori option:selected").val()
      $.ajax({
          url: urlnya+'berita/filter_kategori/',
          data : {'filter_kategori': filter},
          type : 'get',
          cache: false,
        success: function(response){
            $("#berita-tampil").html(response);
            console.log('test');
          } 
      });
    })

  	$("#filter-prestasi").change(function(event) // filterin prestasi
  	{
  		event.preventDefault();
	    var filter = $("#filter-prestasi option:selected").val()
	    $.ajax({
      		url: urlnya+'kemahasiswaan/prestasi_mahasiswa/filter/',
      		data : {'filter': filter},
      		type : 'get',
      		cache: false,
	    	success: function(response){
		        $("#prestasi-tampil").html(response);
      		} 
    	});
  	})

  	$("#filter-angkatan").change(function(event) // filterin alumni angkatan
  	{
  		event.preventDefault();
	    var filter = $("#filter-angkatan option:selected").val()
	    $.ajax({
      		url: urlnya+'kemahasiswaan/alumni/filter/',
      		data : {'filter': filter},
      		type : 'get',
      		cache: false,
	    	success: function(response){
		        $("#alumni-tampil").html(response);
      		} 
    	});
  	})

});