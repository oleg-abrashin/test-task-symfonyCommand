# README.md

## Translate Command

This repository contains a Symfony command that translates strings from an input file and saves the translated strings to an output file.

### Command Name

`app:translate`

### Description

Translates strings from a file and saves the result to another file.

### First Steps

1. Clone the repository:
    ```bash
    git clone git@github.com:oleg-abrashin/test-task-symfonyCommand.git
    ```

2. Open the folder:
    ```bash
    cd test-task-symfonyCommand
    ```

3. Install Symfony dependencies:
    ```bash
    composer install
    ```

4. Prepare the input and output files (e.g., `input.txt` and `output.txt`), or any other files you wish to use.

### Usage

To run the command, use the following syntax:

```bash
php bin/console app:translate <inputFile> <outputFile> [--provider=PROVIDER]
