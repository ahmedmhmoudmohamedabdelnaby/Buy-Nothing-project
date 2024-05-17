<?php
  
  class Reportedpost {
    private $id;
    private $reporter_email;
    private $reported_email;
    private $reported_type;
    private $reason;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getReporterEmail() {
        return $this->reporter_email;
    }

    public function setReporterEmail($reporter_email) {
        $this->reporter_email = $reporter_email;
    }

    public function getReportedType() {
        return $this->reported_type;
    }

    public function setReportedType($reported_type) {
        $this->reported_type = $reported_type;
    }

    public function getReportedEmail() {
        return $this->reported_email;
    }

    public function setReportedEmail($reported_email) {
        $this->reported_email = $reported_email;
    }

    public function getReason() {
        return $this->reason;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }
}








/* interface ReportObserver {
    public function update($reportedpost);
}

class Reportedpost {
    private $user_id;
    private $reason;

    public function __construct($userId, $reason) {
        $this->user_id = $userId;
        $this->reason = $reason;
    }

    public function getuserId() {
        return $this->user_id;
    }

    public function getReason() {
        return $this->reason;
    }
}

  class Admin implements ReportObserver {
    public function update($reportedpost) {
        echo "Admin has been notified of a new report for post " . $reportedpost->getuserId() . " with reason: " . $reportedpost->getReason();
    }
}
 
class ReportedpostSubject {
    private $observers = array();

    public function attach($observer) {
        array_push($this->observers, $observer);
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers($reportedpost) {
        foreach ($this->observers as $observer) {
            $observer->update($reportedpost);
        }
    }

    public function reportPost($postId, $reason) {
        $reportedpost = new Reportedpost($postId, $reason);
        $this->notifyObservers($reportedpost);
    }
}

$reportedpostSubject = new reportedpostSubject();

$admin = new Admin();
$reportedpostSubject->attach($admin);

$reportedpostSubject->reportPost("123", "Inappropriate content"); */
?>