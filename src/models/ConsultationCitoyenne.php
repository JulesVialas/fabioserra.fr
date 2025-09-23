<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/Database.php';

class ConsultationCitoyenne
{
    public $quartier;
    public $satisfaction;
    public $sujets;
    public $etat;
    public $ameliorations;
    public $age;
    public $date_soumission;
    
    public function __construct($quartier, $satisfaction, $sujets, $etat, $ameliorations, $age)
    {
        $this->quartier = $quartier;
        $this->satisfaction = $satisfaction;
        $this->sujets = is_array($sujets) ? implode(', ', $sujets) : $sujets;
        $this->etat = $etat;
        $this->ameliorations = $ameliorations;
        $this->age = $age;
        $this->date_soumission = date('Y-m-d H:i:s');
    }
    
    public function save()
    {
        $db = new Database();
        $sql = "INSERT INTO consultations_citoyennes (quartier, satisfaction, sujets, etat, ameliorations, age, date_soumission) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $params = [
            $this->quartier,
            $this->satisfaction,
            $this->sujets,
            $this->etat,
            $this->ameliorations,
            $this->age,
            $this->date_soumission
        ];
        
        return $db->execute($sql, $params);
    }
    
    public static function getAll()
    {
        $db = new Database();
        $sql = "SELECT * FROM consultations_citoyennes ORDER BY date_soumission DESC";
        return $db->fetchAll($sql);
    }
}
?>