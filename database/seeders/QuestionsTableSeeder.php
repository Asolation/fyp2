<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $questions_1 = [
            'What is the most common form of cyber attack?',
            'What does VPN stand for?',
            'What is phishing?',
            'What is the primary purpose of a firewall?',
            'Which of the following is considered a strong password?',
            'What is the principle of least privilege?',
            'Which of the following is a common type of phishing attack?',
            'What is the main function of antivirus software?',
            'Which of the following best describes "ransomware"?',
            'What is "two-factor authentication" (2FA)?',
        ];
        foreach($questions_1 as $question) {
            Question::create([
                'quiz_id' => 1, // Cybersecurity Basics
                'question_text' => $question,
                'points' => 10,
            ]);
        }

        // Questions for Advanced Cybersecurity
        $questions_2 = [
            'What is a zero-day vulnerability?',
            'What is the purpose of a firewall?',
            'What is penetration testing?',
            'What is social engineering?',
            'What is multi-factor authentication?',
            'What is a Distributed Denial of Service (DDoS) attack?',
            'What is the role of encryption in cybersecurity?',
            'What is a security incident response plan?',
            'What is the difference between symmetric and asymmetric encryption?',
            'What is a honeypot in cybersecurity?'
        ];

        foreach ($questions_2 as $question) {
            Question::create([
                'quiz_id' => 2,
                'question_text' => $question,
                'points' => 10,
            ]);
        }

        // Questions for Network Security
        $questions_3 = [
            'What is a network protocol?',
            'What is the function of a router?',
            'What is a DDoS attack?',
            'What is the purpose of a VPN?',
            'What is a firewall?',
            'What is an IP address?',
            'What is network segmentation?',
            'What is the function of a switch?',
            'What is MAC address filtering?',
            'What is an intrusion detection system (IDS)?'
        ];

        foreach ($questions_3 as $question) {
            Question::create([
                'quiz_id' => 3,
                'question_text' => $question,
                'points' => 10,
            ]);
        }

        // Questions for Ethical Hacking
        $questions_4 = [
            'What is ethical hacking?',
            'What is the difference between black hat and white hat hackers?',
            'Tailgating is also termed as _________',
            'What is a vulnerability assessment?',
            'What is a penetration test?',
            'What is the role of a honeypot in cybersecurity?',
            'What is footprinting in ethical hacking?',
            'What is the purpose of a phishing attack?',
            'What is a rootkit?',
            'What is the principle of least privilege in cybersecurity?'
        ];

        foreach ($questions_4 as $question) {
            Question::create([
                'quiz_id' => 4,
                'question_text' => $question,
                'points' => 10,
            ]);
        }
    }
}
