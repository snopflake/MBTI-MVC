<?php

class InfoModel extends Model
{
    // Mendapatkan semua tipe MBTI
    public function getAllTypes()
    {
        $sql = "SELECT * FROM mbti_types";
        $result = $this->mysqli->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Mendapatkan detail MBTI berdasarkan tipe
    public function getTypeDetail($type)
    {
        $type = $this->mysqli->real_escape_string($type);
        $sql = "SELECT * FROM mbti_types WHERE type = '$type'";
        $result = $this->mysqli->query($sql);

        return $result->fetch_assoc();
    }
}
