<?php

use Phinx\Migration\AbstractMigration;

class MigrateMissionData extends AbstractMigration
{
  public function change()
  {
    print("Creating temporary table\n");
    $this->execute('CREATE TABLE tmp_missions as select * from missions;');

    $mtms = $this->fetchAll('SELECT missions_type_missions.type_mission_id,missions.* from missions_type_missions LEFT JOIN missions on missions_type_missions.mission_id = missions.id');

    for($i = 0;$i < count($mtms);$i++) {
      if(isset($mtms[$i][1])) {
        $new_mission = [
          'name' => $mtms[$i][2],
          'session' => $mtms[$i][3],
          'length' => $mtms[$i][4],
          'description' => $mtms[$i][5],
          'competence' => $mtms[$i][6],
          'internNbr' => $mtms[$i][7],
          'project_id' => $mtms[$i][8],
          'mentor_id' => $mtms[$i][9],
          'created' => $mtms[$i][10],
          'modified' => $mtms[$i][11],
          'archived' => $mtms[$i][12],
          'professor_id' => $mtms[$i][13],
          'type_mission_id' => $mtms[$i][0]
        ];
        $table = $this->table('missions');
        $table->insert($new_mission);
        $table->saveData();

        $last = $this->fetchRow("SELECT id FROM missions ORDER BY id DESC;");
        print("Last mission id: " . $last["id"] . "\n");

        print("Fetching applications with old mission id " . $mtms[$i][1] . "\n");
        $applications = $this->fetchAll('SELECT id,type_mission_id,mission_id from applications where mission_id = ' . $mtms[$i][1] . ';');
        for($j = 0;$j < count($applications);$j++) {
          print("Old mission " . $mtms[$i][1] . " has a type: " . $new_mission["type_mission_id"] . "\n");
          print("Application " . $applications[$j]["id"] . " has a type: " . $applications[$j]["type_mission_id"] . "\n");
          if($applications[$j]["type_mission_id"] == $new_mission["type_mission_id"]) {
            print("Updating application " . $applications[$j]["id"] . " with new id " . $last["id"] . "\n");
            $this->execute("UPDATE applications SET mission_id = " . $last["id"] . " where id = " . $applications[$j]["id"]);
          } else if($applications[$j]["type_mission_id"] == 0) {
            print("Updating application " . $applications[$j]["id"] . " with new id " . $last["id"] . "\n");
            $this->execute("UPDATE applications SET mission_id = " . $last["id"] . " where id = " . $applications[$j]["id"]);
          }
        }

        print("Deleting old mission " . $mtms[$i][1] . "\n");
        $this->execute('DELETE FROM missions where id = ' . $mtms[$i][1]);
        print("------------------------------------\n");
      }
    }
  }
}
