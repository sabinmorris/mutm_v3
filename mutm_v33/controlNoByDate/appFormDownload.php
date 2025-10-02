<?php
  session_start(); //start session
  include('../fpdf181/fpdf.php');
  include('../Controller/connect.php'); //connection

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->SetFont('Arial','IU',8);
    // Then put a blue underlined link
    $this->SetTextColor(0,0,255);
    $this->Write(5,'Application Form','../applications/?regNo='.$_GET["regNo"].'&app=viewIncAppDetails','C');
    $this->Ln();

}
 
  // Page footer
  function Footer()
  {
    // Position at 1.5 cm from bottom
    $this->SetY(-24);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

try {
  //select records from application form table
  if (isset($_GET['regNo'])){
    $regNo = $_GET["regNo"];

    $sql = "SELECT appDate, applicantTitle, appPhoneNo, appEmail, stepStatus, appStatus, certificateStatus, paymentStatus, detId, applName, applGender, applNation, applAddress, whtPhoneNo, applDob, applPasportNo, applSchool, applCurStudies, ApplQualification, applExpStartDate, applExpEndDate, applObjective, applPicture, applCV, applRecDate, applicationdetails.deptId, deptName FROM applications INNER JOIN (applicationdetails INNER JOIN departments USING(deptId)) USING(regNo) WHERE regNo = '".$_GET['regNo']."'";

      $res = $conn->query($sql); //send the query to the dbms
      //check if fetched or not
      if ($ar = $res->fetch(PDO::FETCH_ASSOC)) {
        //if fetched successfully
        //receive variable form the tables
        $appDate = $ar['appDate'];
        $applicantTitle = $ar['applicantTitle'];
        $appPhoneNo = $ar['appPhoneNo'];
        $appEmail = $ar['appEmail'];
        $stepStatus = $ar['stepStatus'];
        $appStatus = $ar['appStatus'];
        $certificateStatus = $ar['certificateStatus'];
        $paymentStatus = $ar['paymentStatus'];
        $detId = $ar['detId'];
        $applName = $ar['applName'];
        $applGender = $ar['applGender'];
        $applNation = $ar['applNation'];
        $applAddress = $ar['applAddress'];
        $whtPhoneNo = $ar['whtPhoneNo'];
        $applDob = $ar['applDob'];
        $applPasportNo = $ar['applPasportNo'];
        $applSchool = $ar['applSchool'];
        $applCurStudies = $ar['applCurStudies'];
        $ApplQualification = $ar['ApplQualification'];
        $applExpStartDate = $ar['applExpStartDate'];
        $applExpEndDate = $ar['applExpEndDate'];
        $applObjective = $ar['applObjective'];
        $applPicture = $ar['applPicture'];
        $applCV = $ar['applCV'];
        $applRecDate = $ar['applRecDate'];
        $deptId = $ar['deptId'];
        $deptName = $ar['deptName'];
        
        $folderapplPicture="../../ioas/dist/img/applPicture/";
        $folderapplCV="../../ioas/dist/img/cv/";

        if ($appDate == '' || $appDate == NULL || $appDate == '0000-00-00') {
          $appDate2 = '';
        }else{
          $appDate2 = date( "d-m-Y", strtotime($appDate));
        }

        if ($applDob == '' || $applDob == NULL || $applDob == '0000-00-00') {
          $applDob2 = '';
        }else{
          $applDob2 = date( "d-m-Y", strtotime($applDob));
        }

        if ($applExpStartDate == '' || $applExpStartDate == NULL || $applExpStartDate == '0000-00-00') {
          $applExpStartDate2 = '';
        }else{
          $applExpStartDate2 = date( "d-m-Y", strtotime($applExpStartDate));
        }
        
        if ($applExpEndDate == '' || $applExpEndDate == NULL || $applExpEndDate == '0000-00-00') {
          $applExpEndDate2 = '';
        }else{
          $applExpEndDate2 = date( "d-m-Y", strtotime($applExpEndDate));
        }
        
        if ($applRecDate == '' || $applRecDate == NULL || $applRecDate == '0000-00-00') {
          $applRecDate2 = '';
        }else{
          $applRecDate2 = date( "d-m-Y", strtotime($applRecDate));
        }
      }else{
        $appDate=$applicantTitle=$appPhoneNo=$appEmail =$stepStatus = $appStatus = $certificateStatus =$paymentStatus = $detId = $applName =$applGender = $applNation = $applAddress =$whtPhoneNo = $applDob = $applPasportNo =$applSchool = $applCurStudies =$ApplQualification = $applExpStartDate =$applExpEndDate = $applObjective =$applPicture = $applRecDate = $deptId = $deptName ='';

        if ($appDate == '' || $appDate == NULL || $appDate == '0000-00-00') {
          $appDate2 = '';
        }else{
          $appDate2 = date( "d-m-Y", strtotime($appDate));
        }

        if ($applDob == '' || $applDob == NULL || $applDob == '0000-00-00') {
          $applDob2 = '';
        }else{
          $applDob2 = date( "d-m-Y", strtotime($applDob));
        }

        if ($applExpStartDate == '' || $applExpStartDate == NULL || $applExpStartDate == '0000-00-00') {
          $applExpStartDate2 = '';
        }else{
          $applExpStartDate2 = date( "d-m-Y", strtotime($applExpStartDate));
        }
        
        if ($applExpEndDate == '' || $applExpEndDate == NULL || $applExpEndDate == '0000-00-00') {
          $applExpEndDate2 = '';
        }else{
          $applExpEndDate2 = date( "d-m-Y", strtotime($applExpEndDate));
        }
        
        if ($applRecDate == '' || $applRecDate == NULL || $applRecDate == '0000-00-00') {
          $applRecDate2 = '';
        }else{
          $applRecDate2 = date( "d-m-Y", strtotime($applRecDate));
        }
      }

      $sql = "SELECT decId, placeId, decStatus, decStartDate, decEndDate, decComment, decDate, placeName FROM decisions INNER JOIN places USING(placeId) WHERE regNo = '".$_GET['regNo']."'";

      $res = $conn->query($sql); //send the query to the dbms
      //check if fetched or not
      if ($ar = $res->fetch(PDO::FETCH_ASSOC)) {
        //if fetched successfully
        $decId = $ar['decId'];
        $placeId = $ar['placeId'];
        $decStatus = $ar['decStatus'];
        $decStartDate = $ar['decStartDate'];
        $decEndDate = $ar['decEndDate'];
        $decComment = $ar['decComment'];
        $decDate = $ar['decDate'];
        $placeName = $ar['placeName'];

        if ($decStartDate == '' || $decStartDate == NULL || $decStartDate == '0000-00-00') {
          $decStartDate = '';
        }else{
          $decStartDate = date( "d-m-Y", strtotime($decStartDate));
        }

        if ($decEndDate == '' || $decEndDate == NULL || $decEndDate == '0000-00-00') {
          $decEndDate = '';
        }else{
          $decEndDate = date( "d-m-Y", strtotime($decEndDate));
        }

      }else{
        $decId = $placeId = $decStatus = $decStartDate = $decEndDate = $decComment = $decDate = $placeName = '';
      }

  }

}
catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
}


$pdf = new PDF();
$pdf->AddPage('P', 'A4', 0); //add new page
$pdf->SetMargins(20,10,20); //set margins (left,top,right)
$pdf->AliasNbPages(); //define an alias for number of pages


//display content start
// Logo
  $pdf->Image('../dist/img/mmh_logo.PNG',100,10,25);
  // Arial bold 15
  $pdf->SetFont('Arial','B',14);
  // Move to the right
  $pdf->Cell(40);
  // Title
  $pdf->SetTextColor(88,82,251); //Set RGB color
  $pdf->Cell(120,50,'MMH - Intenship Online Application System',0,0,'C');
  $pdf->Ln(5);
  $pdf->SetTextColor(0,0,0);
  $pdf->Cell(180,55,'INTENSHIP APPLICATION FORM',0,0,'C');
  $pdf->Ln(5);
  $pdf->SetTextColor(0,0,0);
  $pdf->Cell(180,60,'[Elective Replacement Programme]',0,0,'C');
  $pdf->Ln(3);
  $pdf->SetTextColor(0,0,0);
  
  if ($applPicture != '') {
    $pdf->Ln(40);
    $pdf->Image($folderapplPicture.'/'.$applPicture,170,65,25);
  }else{
    $pdf->Ln(40);
  }
  

  // $pdf->Ln(3); 
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'APPLICANT NAME:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(75,6,$regNo .' - '. $applName,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'APPLICANT TITLE:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applicantTitle,0,0,'L'); 
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'GENDER:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applGender,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'NATIONALITY:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applNation,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'ADDRESS:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applAddress,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'PHONE NO:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$whtPhoneNo,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'EMAIL:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$appEmail,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'DATE OF BIRTH:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applDob2,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'PASSPORT NO.:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applPasportNo,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'SCHOOL/UNIVERSITY:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applSchool,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'CURRENT STUDIES:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applCurStudies,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'CURRENT QUALIFICATION:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$ApplQualification,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'PROPOSED PLACEMENT DEPT:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$deptName,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'START DATE:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applExpStartDate2,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'END DATE:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applExpEndDate2,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'PLACEMENT OBJECTIVE:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(120,6,$applObjective,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(70,6,'APPLICATION STATUS:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->SetTextColor(255,0,0); //Set RGB color
  $pdf->Cell(120,6,$appStatus,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->SetTextColor(0,0,0); //Set RGB color
  $pdf->Cell(70,6,'PAYMENT STATUS:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->SetTextColor(255,0,0); //Set RGB color
  $pdf->Cell(120,6,$paymentStatus,0,0,'L');
  $pdf->Ln(6);
  $pdf->SetFont('Times','B',12);
  $pdf->SetTextColor(0,0,0); //Set RGB color
  $pdf->Cell(70,6,'CERTIFICATE STATUS:',0,0,'L');
  $pdf->SetFont('Times','',12);
  $pdf->SetTextColor(255,0,0); //Set RGB color
  $pdf->Cell(120,6,$certificateStatus,0,0,'L');
  $pdf->SetTextColor(0,0,0); //Set RGB color

  $pdf->Ln(10);
  
  $pdf->SetFont('Times','BU',14);
  $pdf->SetTextColor(0,0,255); //Set RGB color
  $pdf->Cell(180,6,'Attachments',0,0,'L');
  $pdf->SetTextColor(0,0,0); //Set RGB color
  $pdf->Ln(10);
  $pdf->SetFont('Times','B',10);
  $pdf->Cell(10,6,'#',1,0,'C');
  $pdf->Cell(80,6,'Attachment Type',1,0,'C');
  $pdf->Cell(80,6,'Preview',1,0,'C');

  try {
    $folder="../../ioas/dist/img/applAttachment/";
    $sql = "SELECT appAttachId, appAttachType, appAttachCopy, appAttachStatus, detId FROM appattachments INNER JOIN applicationdetails USING(detId) WHERE regNo = '".$_GET['regNo']."' ORDER BY appAttachType ASC";
    $ft = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $ft->execute();
    if($col = $ft->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST)){
      $num = 1;
      do{
        $appAttachId = $col[0];
        $appAttachType = $col[1];
        $appAttachCopy = $col[2];
        $appAttachStatus = $col[3];
        $detId = $col[4];

        $pictureUrl = $folder.$appAttachCopy;

        $pdf->Ln(6);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(10,6,$num,1,0,'C');
        $pdf->Cell(80,6,$appAttachType,1,0,'C');
        if ($appAttachCopy == 'avatar1.png') {
          $pdf->Cell(80,6,'',1,0,'C');
        }else{
          $pdf->Cell(80,6,'Uploaded',1,0,'C');
        }

        $num++;
      }while ($col = $ft->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
    }
  } catch (Exception $e) {
    echo $e->getMessage(); //error generated;
  }

  $pdf->Ln(10);
  
  $pdf->SetFont('Times','BU',14);
  $pdf->SetTextColor(0,0,255); //Set RGB color
  $pdf->Cell(180,6,'MMH Decisions',0,0,'L');
  $pdf->SetTextColor(0,0,0); //Set RGB color
  $pdf->Ln(10);
  $pdf->SetFont('Times','B',10);
  $pdf->Cell(80,6,'Selected Place',1,0,'C');
  $pdf->Cell(30,6,'Start Date',1,0,'C');
  $pdf->Cell(30,6,'End Date',1,0,'C');
  $pdf->Cell(30,6,'Status',1,0,'C');
  $pdf->Ln(6);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(80,8,$placeName,1,0,'C');
  $pdf->Cell(30,8,$decStartDate,1,0,'C');
  $pdf->Cell(30,8,$decEndDate,1,0,'C');
  $pdf->Cell(30,8,$decStatus,1,0,'C');


  // $pdf->Ln(10);

  $pdf->Ln(10);
  $date = new DateTime();
  $tDate = $date->format('l, F jS, Y');
  $pdf->SetFont('Arial','I',10);
  $pdf->SetTextColor(0,0,0);
  $pdf->Cell(0,8,'Prepared By: ' . $_SESSION['uName'] . '. On ' . $tDate,0,0,'C');
  $pdf->Ln(6);
  $pdf->Cell(0,8,'Position: ' . $_SESSION['uRole'],0,0,'C');
  $pdf->Ln(10);
  $pdf->Cell(0,8,'Sign:  ............................                                                            MMH Official Stamp:',0,0,'C');
    
    
$pdf->SetTextColor(0,0,0);
$pdf->Ln(8); 


//display content end

$pdf->Output(); //save or send the document

?>