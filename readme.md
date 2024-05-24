
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
```

### Arguments

- `inputFile` (required): The input file containing strings to translate.
- `outputFile` (required): The output file to save the translated strings.

### Options

- `--provider` (optional): The translation provider. Default is `dummy`.

### Example

Assuming you have an input file `input.txt` and you want to save the translated strings to `output.txt` using the default provider:

```bash
php bin/console app:translate input.txt output.txt
```

If you want to specify a different translation provider:

```bash
php bin/console app:translate input.txt output.txt --provider=google
```

### Error Handling

- If the input file does not exist, the command will output an error message and terminate.
- If the input or output file cannot be opened, the command will output an error message and terminate.

### Development

The translation logic is currently a placeholder. The actual translation logic should be implemented in the `translate` method.

```php
private function translate(string $text, string $provider): string
{
    // TODO: Implement translation logic here in future
    return $text;
}
```

Feel free to contribute by implementing the translation logic or improving the existing code.

### License

This project is licensed under the MIT License. See the LICENSE file for details.

### Note

Usually, adding the `.env` file to the GitHub repository is considered bad practice for development due to security reasons. However, for the purpose of this test task, it is acceptable.

---

For any issues or contributions, please open a pull request or issue on the repository.
