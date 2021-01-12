<?php
$con = mysqli_connect("localhost","root","","db_scholarship");
$sql1 = "SELECT * FROM `scholar_user` ORDER BY `s_name` ASC";
$result1 = $con->query($sql1);

$sql2 = "SELECT COUNT(s_id) FROM `scholar_user` WHERE status='APPROVED'";
$result2 = $con->query($sql2);
$my_array=mysqli_fetch_assoc($result2);

$sql3 = "SELECT COUNT(s_id) FROM `scholar_user`";
$result3 = $con->query($sql3);
$my_array3=mysqli_fetch_assoc($result3);

$sql4 = "SELECT COUNT(id) FROM `scholar_form` WHERE s_gender='M'";
$result4 = $con->query($sql4);
$my_array4=mysqli_fetch_assoc($result4);

$sql5 = "SELECT COUNT(id) FROM `scholar_form` WHERE s_gender='FM'";
$result5 = $con->query($sql5);
$my_array5=mysqli_fetch_assoc($result5);

$sql6 = "SELECT SUM(amount) FROM `scholar_user`";
$result6 = $con->query($sql6);
$my_array6=mysqli_fetch_assoc($result6);

$sql7 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='Sitaram Jindal Foundation Scho'";
$result7 = $con->query($sql7);
$my_array7=mysqli_fetch_assoc($result7);

$sql8 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='The Anant Fellowship'";
$result8 = $con->query($sql8);
$my_array8=mysqli_fetch_assoc($result8);

$sql9 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='Dr. Reddy’s Foundation Sashakt'";
$result9 = $con->query($sql9);
$my_array9=mysqli_fetch_assoc($result9);

$sql10 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='Raman Kant Munjal Scholarship'";
$result10 = $con->query($sql10);
$my_array10=mysqli_fetch_assoc($result10);

$sql11 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='NIU Scholarship cum Admission '";
$result11 = $con->query($sql11);
$my_array11=mysqli_fetch_assoc($result11);

$sql12 = "SELECT COUNT(id) FROM `scholar_form` WHERE scholar_scholarship='CLP India Scholarship Scheme'";
$result12 = $con->query($sql12);
$my_array12=mysqli_fetch_assoc($result12);


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Ln();
$pdf->Write(10, '                                   Scholarship Report ');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',15);
$pdf->Write(7, 'Applications : ');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(90, 10, 'APPLICANT NAME', 1, 0,'C'); 
$pdf->Cell(100, 10, 'STATUS OF APPLICATION', 1, 1, 'C');
if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
  $pdf->SetFont('Arial','I',10);
$pdf->Cell(90, 10, $row["s_name"], 1, 0,'C'); 
$pdf->Cell(100, 10, $row["status"], 1, 1, 'C');
}

} else {
  //echo "0 results";
}
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',15);
$pdf->Write(7,'Analytics : ');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','I',13);
$pdf->Write(5, 'Number of Students who applied for Scholarships by far  :  ');
$pdf->Write(5,array_values($my_array3)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of Students who got approved for scholarships so far  : ');
$pdf->Write(5,array_values($my_array)[0], 'FJ');
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of Boys who got approved for scholarships  : ');
$pdf->Write(5,array_values($my_array4)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of Girls who got approved for scholarships  : ');
$pdf->Write(5,array_values($my_array5)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Total amount donated by far for scholarships  :  Rs.');
$pdf->Write(5,array_values($my_array6)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for G.P. Birla Scholarship  : ');
$pdf->Write(5,array_values($my_array6)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for CLP India Scholarship Programme  : ');
$pdf->Write(5,array_values($my_array12)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for Sitaram Jindal Foundation Scholarship : ');
$pdf->Write(5,array_values($my_array7)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for Dr. Reddys Foundation Sashakt Scholarship : ');
$pdf->Write(5,array_values($my_array9)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for NSAT Scholarship  : ');
$pdf->Write(5,array_values($my_array11)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for Raman Kanth Munjal Scholarship  : ');
$pdf->Write(5,array_values($my_array10)[0]);
$pdf->Ln();
$pdf->Ln();
$pdf->Write(5, 'Number of students applied for The Anant Fellowship Scholarship  : ');
$pdf->Write(5,array_values($my_array8)[0]);
$pdf->Ln();
$pdf->Ln();

$pdf->Output();
$con->close();

?>

     