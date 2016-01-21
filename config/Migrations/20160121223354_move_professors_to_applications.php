<?php

use Phinx\Migration\AbstractMigration;

class MoveProfessorsToApplications extends AbstractMigration
{
    public function change()
    {
      print("Moving professor ids from missions to their associated applications\n");
      print("Fetching all applications with their associated missions\n");
      $applications = $this->fetchAll("SELECT applications.id,applications.mission_id,missions.professor_id FROM applications INNER JOIN missions on missions.id = applications.mission_id;");
      for($i = 0;$i < count($applications);$i++) {
        print("Moving Professor id " . $applications[$i][2] . " from mission " . $applications[$i][1] . " to application " . $applications[$i][0] . "\n");
        $this->execute("UPDATE applications SET professor_id = " . $applications[$i][2] . " WHERE id = " . $applications[$i][0] . ";");
      }
    }
}
