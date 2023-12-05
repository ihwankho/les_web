<?php

namespace App\Http\Controllers;

use DateTime;
use GuzzleHttp\Client;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = env("API_URL");

        $courses = json_decode($client->request("GET", $url . '/courses')->getBody(), true)['data'];

        $file_course = json_decode($client->request("GET", $url . "/filecourses")->getBody(), true)['data'];

        $score = json_decode($client->request("GET", $url . "/scores")->getBody(), true)['data'];
        $scores = collect([]);
        foreach ($score as $scr) {
            if ($scr['id_user'] == 1) {
                $scores->push($scr);
            }
        }

        $data = collect([]);

        foreach ($courses as $course) {
            $temporary = collect([]);
            $assignments = json_decode($client->request("GET", $url . '/assignments')->getBody(), true)['data'];
            $assignment = collect([]);
            foreach ($assignments as $ass) {
                if ($ass['id_course'] == $course['id']) {
                    $assignment->push($ass);
                }
            }
            foreach ($assignment as $task) {
                $dateString = $task['deadline'];
                $dateTime = new DateTime($dateString);
                $formattedDate = $dateTime->format('d F Y H:i:s');

                $taskData = [
                    "id" => $task['id'],
                    "nama" => $task['nama'],
                    "deadline" => $formattedDate,
                ];

                $foundScore = $scores->firstWhere('id_assignment', $task['id']);

                if ($foundScore) {
                    $taskData["status"] = $foundScore['status'];
                } else {
                    $taskData["status"] = "belum selesai";
                }

                $temporary->push($taskData);
            }

            $data->push([
                "course" => $course['nama'],
                "assignment" => $temporary
            ]);
        }

        return view('users.page.assignment.index', compact('data'));
    }
}
