FROM node:16-alpine

# make the 'app' folder the current working directory
WORKDIR /app

# copy project files and folders to the current working directory (i.e. 'app' folder)
COPY ./frontend/package*.json ./

# install project dependencies
RUN npm install