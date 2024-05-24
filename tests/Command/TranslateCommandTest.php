<?php

namespace App\Tests\Command;

use App\Command\TranslateCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Command\Command;

class TranslateCommandTest extends KernelTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
    }

    public function testExecute()
    {
        // Start output buffering
        ob_start();
        try {
            // Boot the kernel and retrieve the application
            $application = new Application();
            $application->add(new TranslateCommand());

            // Find the command and create a CommandTester for it
            $command = $application->find('app:translate');
            $commandTester = new CommandTester($command);

            // Create sample input and output file paths
            $inputFile = 'tests/input.txt';
            $outputFile = 'tests/output.txt';

            // Create a sample input file
            file_put_contents($inputFile, "Hello\nWorld\n");

            // Execute the command with the provided arguments
            $commandTester->execute([
                'inputFile' => $inputFile,
                'outputFile' => $outputFile,
            ]);

            // Check the output file exists and its content
            $this->assertFileExists($outputFile);
            $this->assertStringEqualsFile($outputFile, "Hello\nWorld\n");

            // Check that the output contains the success message
            $output = $commandTester->getDisplay();
            $this->assertStringContainsString('Translation complete. Output saved to ' . $outputFile, $output);

            // Clean up the files
            unlink($inputFile);
            unlink($outputFile);
        } catch (\Throwable $e) {
            $this->fail("Test failed with exception: " . $e->getMessage());
        } finally {
            // End output buffering and clean it
            ob_end_clean();
        }
    }

    public function testInputFileDoesNotExist()
    {
        // Start output buffering
        ob_start();
        try {
            // Boot the kernel and retrieve the application
            $application = new Application();
            $application->add(new TranslateCommand());

            // Find the command and create a CommandTester for it
            $command = $application->find('app:translate');
            $commandTester = new CommandTester($command);

            // Execute the command with a non-existing input file
            $commandTester->execute([
                'inputFile' => 'non_existing_file.txt',
                'outputFile' => 'output.txt',
            ]);

            // Check that the output contains the error message
            $output = $commandTester->getDisplay();
            $this->assertStringContainsString('The input file does not exist.', $output);
            $this->assertEquals(Command::FAILURE, $commandTester->getStatusCode());
        } catch (\Throwable $e) {
            $this->fail("Test failed with exception: " . $e->getMessage());
        } finally {
            // End output buffering and clean it
            ob_end_clean();
        }
    }
}
