import 'package:json_annotation/json_annotation.dart';

part 'data_model.g.dart';

@JsonSerializable()
class DataModel {
  final int count;
  final Links links;
  final List<Data> data;

  DataModel({
    required this.count,
    required this.links,
    required this.data,
  });

  factory DataModel.fromJson(Map<String, dynamic> json) =>
      _$DataModelFromJson(json);

  Map<String, dynamic> toJson() => _$DataModelToJson(this);
}

@JsonSerializable()
class Links {
  final String self;
  final dynamic next;

  Links({
    required this.self,
    required this.next,
  });

  factory Links.fromJson(Map<String, dynamic> json) => _$LinksFromJson(json);

  Map<String, dynamic> toJson() => _$LinksToJson(this);
}

@JsonSerializable()
class Data {
  final int id;
  final int changed;
  final String start;
  final String end;
  final TitleClass title;
  final Description description;
  final Category category;
  final List<Location> locations;
  final Type type;
  final List<dynamic> papers;
  final List<Person> people;
  final int status;
  final int weight;
  final dynamic addons;
  final dynamic parent;
  final String event;

  Data({
    required this.id,
    required this.changed,
    required this.start,
    required this.end,
    required this.title,
    required this.description,
    required this.category,
    required this.locations,
    required this.type,
    required this.papers,
    required this.people,
    required this.status,
    required this.weight,
    required this.addons,
    required this.parent,
    required this.event,
  });

  factory Data.fromJson(Map<String, dynamic> json) => _$DataFromJson(json);

  Map<String, dynamic> toJson() => _$DataToJson(this);

  @override
  String toString() {
    return 'Data{ $id: id, $title: title, $start: start }';
  }
}

@JsonSerializable()
class TitleClass {
  @JsonKey(name: 'pt-br')
  final String? ptBr; // Nullable

  TitleClass({this.ptBr});

  factory TitleClass.fromJson(Map<String, dynamic> json) =>
      _$TitleClassFromJson(json);

  Map<String, dynamic> toJson() => _$TitleClassToJson(this);

  @override
  String toString() {
    return 'TitleClass{ $ptBr: ptBr }';
  }
}

@JsonSerializable()
class Description {
  @JsonKey(name: 'pt-br')
  final String? ptBr; // Nullable

  Description({this.ptBr});

  factory Description.fromJson(Map<String, dynamic> json) =>
      _$DescriptionFromJson(json);

  Map<String, dynamic> toJson() => _$DescriptionToJson(this);
}

@JsonSerializable()
class Category {
  final int id;
  final TitleClass title;
  final String? color; // Nullable
  @JsonKey(name: 'background-color')
  final String? backgroundColor; // Nullable

  Category({
    required this.id,
    required this.title,
    this.color,
    this.backgroundColor,
  });

  factory Category.fromJson(Map<String, dynamic> json) =>
      _$CategoryFromJson(json);

  Map<String, dynamic> toJson() => _$CategoryToJson(this);
}

@JsonSerializable()
class Location {
  final int id;
  final TitleClass title;
  final int parent;
  final dynamic map;

  Location({
    required this.id,
    required this.title,
    required this.parent,
    this.map,
  });

  factory Location.fromJson(Map<String, dynamic> json) =>
      _$LocationFromJson(json);

  Map<String, dynamic> toJson() => _$LocationToJson(this);
}

@JsonSerializable()
class Type {
  final int id;
  final TitleClass title;

  Type({
    required this.id,
    required this.title,
  });

  factory Type.fromJson(Map<String, dynamic> json) => _$TypeFromJson(json);

  Map<String, dynamic> toJson() => _$TypeToJson(this);
}

@JsonSerializable()
class Person {
  final int id;
  final String? title; // Nullable
  final String name;
  final String? institution; // Nullable
  final Bio bio;
  final String? picture; // Nullable
  final int weight;
  final Role role;
  final String hash;

  Person({
    required this.id,
    this.title,
    required this.name,
    this.institution,
    required this.bio,
    this.picture,
    required this.weight,
    required this.role,
    required this.hash,
  });

  factory Person.fromJson(Map<String, dynamic> json) => _$PersonFromJson(json);

  Map<String, dynamic> toJson() => _$PersonToJson(this);
}

@JsonSerializable()
class Bio {
  @JsonKey(name: 'pt-br')
  final String? ptBr; // Nullable

  Bio({this.ptBr});

  factory Bio.fromJson(Map<String, dynamic> json) => _$BioFromJson(json);

  Map<String, dynamic> toJson() => _$BioToJson(this);
}

@JsonSerializable()
class Role {
  final int id;
  final Label label;

  Role({
    required this.id,
    required this.label,
  });

  factory Role.fromJson(Map<String, dynamic> json) => _$RoleFromJson(json);

  Map<String, dynamic> toJson() => _$RoleToJson(this);
}

@JsonSerializable()
class Label {
  @JsonKey(name: 'pt-br')
  final String? ptBr; // Nullable

  Label({this.ptBr});

  factory Label.fromJson(Map<String, dynamic> json) => _$LabelFromJson(json);

  Map<String, dynamic> toJson() => _$LabelToJson(this);
}