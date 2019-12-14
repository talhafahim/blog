<?php 

	// $url = 'http://192.168.100.10/cacti/graph_image.php?local_graph_id=670&rra_id=5&graph_width=1000&graph_height=200&graph_nolegend=';
$url = 'http://www.myguide.move.pk/images/ci_helper.png';
$file = 'talha.php';


echo '<img src="'.base64_to_jpeg($file,$url).'">';	


function base64_to_jpeg($output_file,$url) {

	$type = pathinfo($url, PATHINFO_EXTENSION);
	$data = file_get_contents($url);
	$base64_string = 'data:image/' . $type . ';base64,' . base64_encode($data);
	    // open the output file for writing
	$ifp = fopen( $output_file, 'wb' ); 

	$data = explode( ',', $base64_string );
	    // we could add validation here with ensuring count( $data ) > 1
	fwrite( $ifp, base64_decode( $data[ 1 ] ) );
	    // clean up the file resource
	fclose( $ifp ); 

	return $output_file; 
}



?>