from __future__ import annotations

import json
from pathlib import Path

from jsonschema import Draft7Validator, validate


def main() -> None:
    repo_root = Path(__file__).resolve().parent.parent
    schema_path = repo_root / "ops" / "state.schema.json"
    data_path = repo_root / "ops" / "state.json"

    with schema_path.open("r", encoding="utf-8") as schema_file:
        schema = json.load(schema_file)

    with data_path.open("r", encoding="utf-8") as data_file:
        data = json.load(data_file)

    Draft7Validator.check_schema(schema)
    validate(instance=data, schema=schema)
    print("state.json valid")


if __name__ == "__main__":
    main()
