$(document).ready(function() {
	// menghilangkan tombol cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		// munculkan loader
		$('.loader').show();
		
		// $.get()
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
			// masukan data ke halaman index.html
			$('#container').html(data);
			$('.loader').hide();
		});

	});

});