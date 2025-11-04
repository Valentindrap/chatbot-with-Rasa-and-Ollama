# run_rasa.py
import os
import asyncio

if os.name == "nt":
    asyncio.set_event_loop_policy(asyncio.WindowsSelectorEventLoopPolicy())

from rasa.__main__ import main

if __name__ == "__main__":
    main()
