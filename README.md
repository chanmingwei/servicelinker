Commands

```bash
composer run php-cs-fixer fix
npm run lint
npm run fix
```

For VSCode Settings(JSON)

```json
{
    "emeraldwalk.runonsave": {
        "commands": [
            {
                "match": "\\.php$",
                "isAsync": true,
                "cmd": "composer run php-cs-fixer fix ${file}"
            },
        ]
    }
}
```
