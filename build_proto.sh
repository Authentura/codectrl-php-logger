protoc --proto_path=codectrl-protobuf-specifications \
  --php_out=src/protobuf \
  --grpc_out=src/protobuf \
  --plugin=protoc-gen-grpc=bins/opt/grpc_php_plugin \ 
  ./codectrl-protobuf-specifications/cc_service.proto
