<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = '[
                        {
                            "title": "HPL Item 355 H",
                            "assigned": "Andi, Ihwan",
                            "target_quantity": 7000,
                            "description": "Packing menggunakan palet Merah"
                        },
                        {
                            "title": "HPL Item 121 AA",
                            "assigned": "Refin, Anggi",
                            "target_quantity": 5000,
                            "description": "Packing menggunakan palet Hitam"
                        },
                        {
                            "title": "HPL Item 153 AA",
                            "assigned": "Roni, Rizky",
                            "target_quantity": 3500,
                            "description": "Jika sudah selesai simpan ke line A1"
                        },
                        {
                            "title": "HPL Item 909 J",
                            "assigned": "Rudi, Mahfud",
                            "target_quantity": 4200,
                            "description": "Jika sudah selesai simpan ke line A2"
                        },
                        {
                            "title": "Glossy Item 910 J",
                            "assigned": "Gufron, Daffa",
                            "target_quantity": 3000,
                            "description": "Tolong kerjakan dengan lebih teliti"
                        },
                        {
                            "title": "Solid Item 276 B",
                            "assigned": "Nandika, Annas",
                            "target_quantity": 4500,
                            "description": "Tolong kerjakan sebelum deadline"
                        },
                        {
                            "title": "Glossy Item 167 AA",
                            "assigned": "Arif, Soleh",
                            "target_quantity": 4000,
                            "description": "Tolong kerjakan sebelum deadline"
                        },
                        {
                            "title": "Solid Item 1038 B",
                            "assigned": "Taslim, Heryanto",
                            "target_quantity": 4400,
                            "description": "Kerjakan sesuai target"
                        },
                        {
                            "title": "Solid Item 111 AA",
                            "assigned": "Corey, Ahmad",
                            "target_quantity": 5000,
                            "description": "Kerjakan sesuai target"
                        },
                        {
                            "title": "HPL Item 327 H",
                            "assigned": "Rudi, Maman",
                            "target_quantity": 3500,
                            "description": "Kerjakan sesuai target"
                        },
                        {
                            "title": "HPL Item 849 J",
                            "assigned": "Soleh, Fadli",
                            "target_quantity": 4000,
                            "current_quantity": 2000,
                            "progress": "50",
                            "description": "Selesaikan sebelum deadline",
                            "task_status_id": "2"
                        },
                        {
                            "title": "Solid Item 037 G",
                            "assigned": "Rifky, Nandika",
                            "target_quantity": 5600,
                            "current_quantity": 5999,
                            "progress": "99",
                            "task_status_id": "2"
                        },
                        {
                            "title": "Solid Item 040 G",
                            "assigned": "Hery, Refin",
                            "target_quantity": 3000,
                            "current_quantity": 2000,
                            "progress": "66",
                            "description": "Simpan di Line C3",
                            "task_status_id": "2"
                        },
                        {
                            "title": "Solid Item 001 A",
                            "assigned": "Riki, Yuleno",
                            "target_quantity": 6000,
                            "current_quantity": 2000,
                            "progress": "33",
                            "description": "Selesaikan sebelum deadline",
                            "task_status_id": "2"
                        },
                        {
                            "title": "Glossy Item 167 AA",
                            "assigned": "Abdul, Yanto",
                            "target_quantity": 5000,
                            "current_quantity": 5000,
                            "progress": "100",
                            "description": "Selesaikan sebelum deadline",
                            "task_status_id": "3"
                        },
                        {
                            "title": "HPL Item 355 H",
                            "assigned": "Anggi, Amad",
                            "target_quantity": 4300,
                            "current_quantity": 4300,
                            "progress": "100",
                            "task_status_id": "3"
                        },
                        {
                            "title": "HPL Item 153 AA",
                            "assigned": "Taufik, Corey",
                            "target_quantity": 3500,
                            "current_quantity": 4000,
                            "progress": "115",
                            "description": "Tolong kerjakan segera, jika sudah selesai packing dengan rapi",
                            "task_status_id": "3"
                        },
                        {
                            "title": "HPL Item 849 J",
                            "assigned": "Rosyid, Deni",
                            "target_quantity": 4000,
                            "current_quantity": 5000,
                            "progress": "125",
                            "description": "Kerjakan segera sebelum deadline, lebih dari terget tidak masalah",
                            "task_status_id": "3"
                        },
                        {
                            "title": "Glossy Item 167 AA",
                            "assigned": "Ihwan, Andi",
                            "target_quantity": 3000,
                            "current_quantity": 3000,
                            "progress": "100",
                            "description": "Selesaikan segera dan jika sudah selesai simpan di line A1",
                            "task_status_id": "3"
                        }
                    ]';

        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray as $data) {
            Task::create($data);
        }
    }
}
