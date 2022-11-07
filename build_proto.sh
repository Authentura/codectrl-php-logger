protoc --proto_path=protos --php_out=src/protobuf --grpc_out=src/protobuf --plugin=protoc-gen-grpc=bins/opt/grpc_php_plugin ./protos/cc_service.proto
