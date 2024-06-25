# Ugarit Transliterator

This is one of my favourite projects, the Ugarit Transliterator
where I aim to make a tool to help understand, and record, the long forgotten ugaritic language.

## Requirements

- A Linux-running machine (Preferably)
- Docker
- Docker compose

## Run: step-by-step

Create the network that will enrobe the containers.

```bash
sudo docker network create ugarit-network
```

Build the images with ``docker composer.``

```bash
sudo docker-compose build
```

Bring up the containers, or update them.

```bash
sudo docker-compose up -d
```

