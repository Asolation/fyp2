<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Answers for Cybersecurity Basics
        Answer::create([
            'question_id' => 1, // What is the most common form of cyber attack?
            'answer_text' => 'Phishing',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 1,
            'answer_text' => 'Malware',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 1,
            'answer_text' => 'Ransomware',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 1,
            'answer_text' => 'Spyware',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 2, // What does VPN stand for?
            'answer_text' => 'Virtual Private Network',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Virtual Public Network',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Virtual Protected Network',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 2,
            'answer_text' => 'Virtual Personal Network',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 3, // What is phishing?
            'answer_text' => 'A technique used to steal sensitive information by pretending to be a trustworthy entity.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 3,
            'answer_text' => 'A type of malware that replicates itself.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 3,
            'answer_text' => 'A form of social engineering that involves baiting victims.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 3,
            'answer_text' => 'An attack that uses brute force to guess passwords.',
            'is_correct' => false,
        ]);

        // Answers for Advanced Cybersecurity
        Answer::create([
            'question_id' => 4, // What is a zero-day vulnerability?
            'answer_text' => 'A vulnerability that is unknown to the vendor and has no patch.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 4,
            'answer_text' => 'A known vulnerability with an existing patch.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 4,
            'answer_text' => 'A vulnerability that is known to the vendor but not patched.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 4,
            'answer_text' => 'A vulnerability that has been exploited.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 5, // What is the purpose of a firewall?
            'answer_text' => 'To monitor and control incoming and outgoing network traffic.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 5,
            'answer_text' => 'To prevent malware infections.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 5,
            'answer_text' => 'To encrypt data during transmission.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 5,
            'answer_text' => 'To manage network bandwidth.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 6, // What is penetration testing?
            'answer_text' => 'A method used to evaluate the security of a system by simulating an attack.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 6,
            'answer_text' => 'A method used to encrypt data.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 6,
            'answer_text' => 'A technique for data recovery.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 6,
            'answer_text' => 'A way to manage network traffic.',
            'is_correct' => false,
        ]);

        // Answers for Network Security
        Answer::create([
            'question_id' => 7, // What is a network protocol?
            'answer_text' => 'A set of rules for data communication between devices.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 7,
            'answer_text' => 'A type of network attack.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 7,
            'answer_text' => 'A software for managing network hardware.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 7,
            'answer_text' => 'A physical device used in networking.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 8, // What is the function of a router?
            'answer_text' => 'To forward data packets between computer networks.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 8,
            'answer_text' => 'To encrypt data.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 8,
            'answer_text' => 'To store data.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 8,
            'answer_text' => 'To manage user accounts.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 9, // What is a DDoS attack?
            'answer_text' => 'A Distributed Denial of Service attack aimed at disrupting the normal traffic of a targeted server, service, or network.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 9,
            'answer_text' => 'A type of malware attack.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 9,
            'answer_text' => 'A way to protect against data breaches.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 9,
            'answer_text' => 'A protocol for secure communication.',
            'is_correct' => false,
        ]);

        // Answers for Ethical Hacking
        Answer::create([
            'question_id' => 10, // What is ethical hacking?
            'answer_text' => 'The practice of intentionally probing a system for security weaknesses.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 10,
            'answer_text' => 'Hacking performed by criminals.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 10,
            'answer_text' => 'A type of encryption.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 10,
            'answer_text' => 'A method for data recovery.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 11, // What is the difference between black hat and white hat hackers?
            'answer_text' => 'Black hat hackers break into systems illegally, while white hat hackers test systems legally.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 11,
            'answer_text' => 'Black hat hackers use encryption, while white hat hackers do not.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 11,
            'answer_text' => 'Black hat hackers work for companies, while white hat hackers work independently.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 11,
            'answer_text' => 'Black hat hackers use hardware, while white hat hackers use software.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 12, // What is social engineering?
            'answer_text' => 'Manipulating people into divulging confidential information.',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => 12,
            'answer_text' => 'A method of encrypting data.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 12,
            'answer_text' => 'A type of malware attack.',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => 12,
            'answer_text' => 'A way to secure communication.',
            'is_correct' => false,
        ]);
    }
}
