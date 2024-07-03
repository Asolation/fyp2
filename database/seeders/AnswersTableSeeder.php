<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Answers for Cybersecurity Basics
        $answers_1 = [
            'What is the most common form of cyber attack?' => [
                ['text' => 'Phishing', 'is_correct' => true],
                ['text' => 'DDoS', 'is_correct' => false],
                ['text' => 'Malware', 'is_correct' => false],
                ['text' => 'Man-in-the-middle', 'is_correct' => false],
            ],
            'What does VPN stand for?' => [
                ['text' => 'Virtual Private Network', 'is_correct' => true],
                ['text' => 'Virtual Public Network', 'is_correct' => false],
                ['text' => 'Virtual Protected Network', 'is_correct' => false],
                ['text' => 'Verified Private Network', 'is_correct' => false],
            ],
            'What is phishing?' => [
                ['text' => 'A type of social engineering attack', 'is_correct' => true],
                ['text' => 'A method to increase website traffic', 'is_correct' => false],
                ['text' => 'A tool for network scanning', 'is_correct' => false],
                ['text' => 'A software update process', 'is_correct' => false],
            ],
            'What is the primary purpose of a firewall?' => [
                ['text' => 'To block unauthorized access', 'is_correct' => true],
                ['text' => 'To store sensitive data', 'is_correct' => false],
                ['text' => 'To manage user accounts', 'is_correct' => false],
                ['text' => 'To increase network speed', 'is_correct' => false],
            ],
            'Which of the following is considered a strong password?' => [
                ['text' => 'P@ssw0rd!', 'is_correct' => true],
                ['text' => '123456', 'is_correct' => false],
                ['text' => 'password', 'is_correct' => false],
                ['text' => 'qwerty', 'is_correct' => false],
            ],
            'What is the principle of least privilege?' => [
                ['text' => 'Giving users only the access they need to perform their job', 'is_correct' => true],
                ['text' => 'Allowing all users full access to all systems', 'is_correct' => false],
                ['text' => 'Providing access based on seniority', 'is_correct' => false],
                ['text' => 'No restrictions on user access', 'is_correct' => false],
            ],
            'Which of the following is a common type of phishing attack?' => [
                ['text' => 'Email scams', 'is_correct' => true],
                ['text' => 'Hardware failures', 'is_correct' => false],
                ['text' => 'Software updates', 'is_correct' => false],
                ['text' => 'Power outages', 'is_correct' => false],
            ],
            'What is the main function of antivirus software?' => [
                ['text' => 'To detect and remove malware', 'is_correct' => true],
                ['text' => 'To speed up the computer', 'is_correct' => false],
                ['text' => 'To backup files', 'is_correct' => false],
                ['text' => 'To manage network connections', 'is_correct' => false],
            ],
            'Which of the following best describes "ransomware"?' => [
                ['text' => 'Software that encrypts files and demands payment', 'is_correct' => true],
                ['text' => 'Software that tracks user activity', 'is_correct' => false],
                ['text' => 'A tool used for network management', 'is_correct' => false],
                ['text' => 'A type of data backup solution', 'is_correct' => false],
            ],
            'What is "two-factor authentication" (2FA)?' => [
                ['text' => 'A security process that requires two forms of identification', 'is_correct' => true],
                ['text' => 'A method to double the speed of authentication', 'is_correct' => false],
                ['text' => 'A type of firewall configuration', 'is_correct' => false],
                ['text' => 'A method to increase storage capacity', 'is_correct' => false],
            ],
        ];

        foreach ($answers_1 as $question_text => $answer_set1) {
            $question = Question::where('question_text', $question_text)->first();

            if ($question) {
                foreach ($answer_set1 as $answer_data1) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answer_data1['text'],
                        'is_correct' => $answer_data1['is_correct'],
                    ]);
                }
            }
        }

        // Answers for Advanced Cybersecurity
        $answers_2 = [
            'What is a zero-day vulnerability?' => [
                ['text' => 'A vulnerability that is exploited before it is known', 'is_correct' => true],
                ['text' => 'A vulnerability that is discovered and patched immediately', 'is_correct' => false],
                ['text' => 'A type of antivirus software', 'is_correct' => false],
                ['text' => 'A method of encrypting data', 'is_correct' => false],
            ],
            'What is the purpose of a firewall?' => [
                ['text' => 'To block unauthorized access', 'is_correct' => true],
                ['text' => 'To store sensitive data', 'is_correct' => false],
                ['text' => 'To manage user accounts', 'is_correct' => false],
                ['text' => 'To increase network speed', 'is_correct' => false],
            ],
            'What is penetration testing?' => [
                ['text' => 'A simulated cyber attack to test system security', 'is_correct' => true],
                ['text' => 'A method of data encryption', 'is_correct' => false],
                ['text' => 'A type of phishing attack', 'is_correct' => false],
                ['text' => 'A network speed test', 'is_correct' => false],
            ],
            'What is social engineering?' => [
                ['text' => 'Manipulating people into divulging confidential information', 'is_correct' => true],
                ['text' => 'Using software to hack into systems', 'is_correct' => false],
                ['text' => 'Encrypting data to protect it', 'is_correct' => false],
                ['text' => 'Testing system vulnerabilities', 'is_correct' => false],
            ],
            'What is multi-factor authentication?' => [
                ['text' => 'A security system that requires multiple forms of verification', 'is_correct' => true],
                ['text' => 'A single password authentication method', 'is_correct' => false],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A type of firewall', 'is_correct' => false],
            ],
            'What is a Distributed Denial of Service (DDoS) attack?' => [
                ['text' => 'An attack where multiple systems flood the bandwidth of a targeted system', 'is_correct' => true],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A type of social engineering attack', 'is_correct' => false],
                ['text' => 'A simulated cyber attack to test system security', 'is_correct' => false],
            ],
            'What is the role of encryption in cybersecurity?' => [
                ['text' => 'To protect data by converting it into an unreadable format', 'is_correct' => true],
                ['text' => 'To increase network speed', 'is_correct' => false],
                ['text' => 'To store data', 'is_correct' => false],
                ['text' => 'To manage user accounts', 'is_correct' => false],
            ],
            'What is a security incident response plan?' => [
                ['text' => 'A plan to respond to and manage the aftermath of a security breach', 'is_correct' => true],
                ['text' => 'A plan to increase network speed', 'is_correct' => false],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A strategy to manage user accounts', 'is_correct' => false],
            ],
            'What is the difference between symmetric and asymmetric encryption?' => [
                ['text' => 'Symmetric uses one key for encryption and decryption, asymmetric uses two keys', 'is_correct' => true],
                ['text' => 'Symmetric uses two keys, asymmetric uses one key', 'is_correct' => false],
                ['text' => 'Symmetric is less secure than asymmetric', 'is_correct' => false],
                ['text' => 'There is no difference', 'is_correct' => false],
            ],
            'What is a honeypot in cybersecurity?' => [
                ['text' => 'A decoy system used to attract and monitor attackers', 'is_correct' => true],
                ['text' => 'A tool to increase network speed', 'is_correct' => false],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A type of firewall', 'is_correct' => false],
            ],
        ];

        foreach ($answers_2 as $question_text => $answer_set2) {
            $question = Question::where('question_text', $question_text)->first();

            if ($question) {
                foreach ($answer_set2 as $answer_data2) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answer_data2['text'],
                        'is_correct' => $answer_data2['is_correct'],
                    ]);
                }
            }
        }

        // Answers for Network Security
        $answers_3 = [
            'What is a network protocol?' => [
                ['text' => 'A set of rules for data communication', 'is_correct' => true],
                ['text' => 'A type of network hardware', 'is_correct' => false],
                ['text' => 'A software application', 'is_correct' => false],
                ['text' => 'A security feature', 'is_correct' => false],
            ],
            'What is the function of a router?' => [
                ['text' => 'To direct data packets between networks', 'is_correct' => true],
                ['text' => 'To store data', 'is_correct' => false],
                ['text' => 'To encrypt data', 'is_correct' => false],
                ['text' => 'To filter network traffic', 'is_correct' => false],
            ],
            'What is social engineering?' => [
                ['text' => 'Manipulating people into divulging confidential information', 'is_correct' => true],
                ['text' => 'Using software to hack into systems', 'is_correct' => false],
                ['text' => 'Encrypting data to protect it', 'is_correct' => false],
                ['text' => 'Testing system vulnerabilities', 'is_correct' => false],
            ],
            'What is a DDoS attack?' => [
                ['text' => 'An attack where multiple systems overwhelm a target', 'is_correct' => true],
                ['text' => 'A method of data encryption', 'is_correct' => false],
                ['text' => 'A type of firewall', 'is_correct' => false],
                ['text' => 'A network performance test', 'is_correct' => false],
            ],
            'What is the purpose of a VPN?' => [
                ['text' => 'To create a secure connection over the internet', 'is_correct' => true],
                ['text' => 'To speed up internet connection', 'is_correct' => false],
                ['text' => 'To store data', 'is_correct' => false],
                ['text' => 'To manage user accounts', 'is_correct' => false],
            ],
            'What is a firewall?' => [
                ['text' => 'A security system that monitors and controls incoming and outgoing network traffic', 'is_correct' => true],
                ['text' => 'A tool to increase network speed', 'is_correct' => false],
                ['text' => 'A method of data encryption', 'is_correct' => false],
                ['text' => 'A network device that connects multiple computers', 'is_correct' => false],
            ],
            'What is an IP address?' => [
                ['text' => 'A unique address that identifies a device on a network', 'is_correct' => true],
                ['text' => 'A type of data encryption', 'is_correct' => false],
                ['text' => 'A network protocol', 'is_correct' => false],
                ['text' => 'A security feature', 'is_correct' => false],
            ],
            'What is network segmentation?' => [
                ['text' => 'Dividing a network into smaller parts to improve security and performance', 'is_correct' => true],
                ['text' => 'Connecting multiple networks together', 'is_correct' => false],
                ['text' => 'Encrypting data on a network', 'is_correct' => false],
                ['text' => 'Monitoring network traffic', 'is_correct' => false],
            ],
            'What is the function of a switch?' => [
                ['text' => 'To connect devices within a single network', 'is_correct' => true],
                ['text' => 'To route data between different networks', 'is_correct' => false],
                ['text' => 'To monitor network traffic', 'is_correct' => false],
                ['text' => 'To encrypt data', 'is_correct' => false],
            ],
            'What is MAC address filtering?' => [
                ['text' => 'A security feature that controls network access based on device MAC addresses', 'is_correct' => true],
                ['text' => 'A method of data encryption', 'is_correct' => false],
                ['text' => 'A tool to monitor network traffic', 'is_correct' => false],
                ['text' => 'A network performance test', 'is_correct' => false],
            ],
            'What is an intrusion detection system (IDS)?' => [
                ['text' => 'A device or software that monitors a network for malicious activity', 'is_correct' => true],
                ['text' => 'A type of firewall', 'is_correct' => false],
                ['text' => 'A method of data encryption', 'is_correct' => false],
                ['text' => 'A network device that connects multiple computers', 'is_correct' => false],
            ],
        ];

        foreach ($answers_3 as $question_text => $answer_set3) {
            $question = Question::where('question_text', $question_text)->first();

            if ($question) {
                foreach ($answer_set3 as $answer_data3) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answer_data3['text'],
                        'is_correct' => $answer_data3['is_correct'],
                    ]);
                }
            }
        }

        // Answers for Ethical Hacking
        $answers_4 = [
            'What is ethical hacking?' => [
                ['text' => 'The practice of bypassing system security to identify potential data breaches and threats', 'is_correct' => true],
                ['text' => 'The act of hacking for malicious purposes', 'is_correct' => false],
                ['text' => 'Hacking without any authorization', 'is_correct' => false],
                ['text' => 'Using hacking tools for personal gain', 'is_correct' => false],
            ],
            'What is the difference between black hat and white hat hackers?' => [
                ['text' => 'Black hat hackers have malicious intent, while white hat hackers are authorized to find vulnerabilities', 'is_correct' => true],
                ['text' => 'Black hat hackers are government officials, while white hat hackers are independent', 'is_correct' => false],
                ['text' => 'There is no difference', 'is_correct' => false],
                ['text' => 'White hat hackers have malicious intent, while black hat hackers are authorized to find vulnerabilities', 'is_correct' => false],
            ],
            'What is social engineering?' => [
                ['text' => 'Manipulating people into divulging confidential information', 'is_correct' => true],
                ['text' => 'Using software to hack into systems', 'is_correct' => false],
                ['text' => 'Encrypting data to protect it', 'is_correct' => false],
                ['text' => 'Testing system vulnerabilities', 'is_correct' => false],
            ],
            'What is a vulnerability assessment?' => [
                ['text' => 'A systematic review of security weaknesses in an information system', 'is_correct' => true],
                ['text' => 'A type of malware', 'is_correct' => false],
                ['text' => 'A process to create secure passwords', 'is_correct' => false],
                ['text' => 'A tool used to increase network speed', 'is_correct' => false],
            ],
            'What is a penetration test?' => [
                ['text' => 'A simulated cyber attack against a system to check for vulnerabilities', 'is_correct' => true],
                ['text' => 'A test to measure network speed', 'is_correct' => false],
                ['text' => 'A process to encrypt data', 'is_correct' => false],
                ['text' => 'A method to monitor network traffic', 'is_correct' => false],
            ],
            'What is the role of a honeypot in cybersecurity?' => [
                ['text' => 'To attract and monitor attackers', 'is_correct' => true],
                ['text' => 'To increase network speed', 'is_correct' => false],
                ['text' => 'To store data securely', 'is_correct' => false],
                ['text' => 'To manage user accounts', 'is_correct' => false],
            ],
            'What is footprinting in ethical hacking?' => [
                ['text' => 'The process of gathering information about a target system', 'is_correct' => true],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A tool to increase network speed', 'is_correct' => false],
                ['text' => 'A type of firewall', 'is_correct' => false],
            ],
            'What is the purpose of a phishing attack?' => [
                ['text' => 'To trick individuals into providing sensitive information', 'is_correct' => true],
                ['text' => 'To increase network speed', 'is_correct' => false],
                ['text' => 'To test system vulnerabilities', 'is_correct' => false],
                ['text' => 'To monitor network traffic', 'is_correct' => false],
            ],
            'What is a rootkit?' => [
                ['text' => 'A set of software tools used by an attacker to gain control over a computer system', 'is_correct' => true],
                ['text' => 'A method to encrypt data', 'is_correct' => false],
                ['text' => 'A network device that connects multiple computers', 'is_correct' => false],
                ['text' => 'A type of firewall', 'is_correct' => false],
            ],
            'What is the principle of least privilege in cybersecurity?' => [
                ['text' => 'Granting only the minimum access necessary for users to perform their jobs', 'is_correct' => true],
                ['text' => 'Allowing all users full access to all systems', 'is_correct' => false],
                ['text' => 'Providing access based on seniority', 'is_correct' => false],
                ['text' => 'No restrictions on user access', 'is_correct' => false],
            ],
        ];

        foreach ($answers_4 as $question_text => $answer_set4) {
            $question = Question::where('question_text', $question_text)->first();

            if ($question) {
                foreach ($answer_set4 as $answer_data4) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answer_data4['text'],
                        'is_correct' => $answer_data4['is_correct'],
                    ]);
                }
            }
        }
    }
}
