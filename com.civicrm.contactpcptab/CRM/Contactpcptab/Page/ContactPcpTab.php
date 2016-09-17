<?php

require_once 'CRM/Core/Page.php';

class CRM_Contactpcptab_Page_ContactPcpTab extends CRM_Core_Page {
  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('ContactPcpTab'));
	$this->_contactId = CRM_Utils_Request::retrieve('cid', 'Positive', $this, TRUE);
	//get personal campain page basics
	list($pcpBlock, $pcpInfo) = CRM_PCP_BAO_PCP::getPcpDashboardInfo($this->_contactId);
	
	
	foreach($pcpInfo as $row)
	{
		///get pcp id
		$prms = array('id' => $row['pcpId']);
		CRM_Core_DAO::commonRetrieve('CRM_PCP_DAO_PCP', $prms, $pcpInfoContrSingle);
		// get total amount
		$totalAmount = CRM_PCP_BAO_PCP::thermoMeter($row['pcpId']);
		$pcpInfoContrSingle["total"] = $totalAmount;
		///get honor details
		$honor = CRM_PCP_BAO_PCP::honorRoll($row['pcpId']);
		$pcpInfoContrSingle["totalContributions"] = count($honor);
		//set all pcpInfo
		$pcpInfoContrSingle["pcpId"] = $row['pcpId'];
		$pcpInfoContrSingle["pcpStatus"] = $row['pcpStatus'];
		$pcpInfoContrSingle["pcpTitle"] = $row['pcpTitle'];
		$pcpInfoContrSingle["pageTitle"] = $row['pageTitle'];
		$pcpInfoContrSingle["class"] = $row['class'];

		$pcpInfoContrSingle["action"] = $row['action'];
		
		$pcpInfoContribution[] = $pcpInfoContrSingle;
	}
    $this->assign('pcpInfoContribution',$pcpInfoContribution);

    //$this->assign('pcpBlock', $pcpBlock);
    $this->assign('pcpInfo', $pcpInfo);
	
    // Example: Assign a variable for use in a template
    //$this->assign('currentTime', date('Y-m-d H:i:s'));
//	$this->assign("contact_id",$this->_contactId);
    parent::run();
  }
}
